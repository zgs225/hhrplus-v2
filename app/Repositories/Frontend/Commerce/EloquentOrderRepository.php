<?php

namespace App\Repositories\Frontend\Commerce;

use App\Exceptions\GeneralException;
use App\Models\PackageGood;
use Carbon\Carbon;
use DB;
use Auth;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Http\Requests\Frontend\OrderRequest;

class EloquentOrderRepository implements OrderContract
{

    public function create(OrderRequest $request)
    {
       return DB::transaction(function () use ($request) {
           $order = new Order($request->all());

           $order->buyer_ip = $request->ip();
           $order->order_no = $this->generateOrderNo();
           if (Auth::check())
               $order->user_id = Auth::id();
           $order->save();

           $this->setInitialOrderStatus($order);
           $this->saveOrderItems($order, $request);

           $order->total_amount = $order->orderItems()->sum('total_amount');
           $order->actual_amount = $order->orderItems()->sum('actual_amount');
           $order->discount_amount = $order->orderItems()->sum('discount_amount');
           $order->save();

           return $order;
        });
    }

    public function generateOrderNo($prefix = '')
    {
        return sprintf('%s%s%s', $prefix, date('YmdHisB'), strtoupper(substr(uniqid(sha1(time())), 0, 6)));
    }

    protected function setInitialOrderStatus($order) {
        $this->updateOrderStatus($order, OrderStatus::STATUS_CODE_UN_PAY);
    }

    protected function saveOrderItems($order, $request) {
        $packageGood = PackageGood::find($request->get('package_good_id'));
        $orderItems  = $this->createOrderItemsFromPackageGood($packageGood);
        $order->orderItems()->saveMany($orderItems);
    }

    protected function createOrderItemsFromPackageGood($packageGood) {
        $items = [];

        foreach ($packageGood->goodItems as $goodItem) {
            array_push($items, new OrderItem([
                'package_good_id' => $packageGood->id,
                'product_name' => $goodItem->getProduct()->name,
                'list_price' => $goodItem->getProduct()->list_price,
                'quantity' => $goodItem->quantity,
                'total_amount' => $goodItem->quantity * $goodItem->sku->price,
                'actual_amount' => $goodItem->quantity * $goodItem->sku->price,
                'discount_amount' => 0
            ]));
        }

        return $items;
    }

    public function paymentSuccess(Order $order)
    {
        DB::transaction(function () use ($order) {
            $order->update(['paid_at' => Carbon::now()]);

            $this->updateOrderStatus($order, OrderStatus::STATUS_CODE_PAYMENT_SUCCESS);

            // TODO 减少库存
        });
    }

    public function updateOrderStatus(Order $order, $statusCode)
    {
        OrderStatus::where(['order_id' => $order->id, 'is_current' => true])
            ->update(['is_current' => false]);

        switch($statusCode) {
            case OrderStatus::STATUS_CODE_UN_PAY:
                $order->orderStatuses()->save(new OrderStatus([
                    'status_code' => OrderStatus::STATUS_CODE_UN_PAY,
                    'status' => OrderStatus::STATUS_UN_PAY,
                    'description' => '创建订单',
                    'is_current' => true
                ]));
                break;
            case OrderStatus::STATUS_CODE_PAYMENT_SUCCESS:
                $order->orderStatuses()->save(new OrderStatus([
                    'status_code' => OrderStatus::STATUS_CODE_PAYMENT_SUCCESS,
                    'status' => OrderStatus::STATUS_PAYMENT_SUCCESS,
                    'description' => '订单支付成功',
                    'is_current' => true
                ]));
                break;
            default:
                throw new GeneralException("未知的订单状态码");
        }
    }
}