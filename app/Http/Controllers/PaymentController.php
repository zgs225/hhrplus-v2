<?php

namespace App\Http\Controllers;

use Omnipay;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Http\Requests;
use App\Repositories\Frontend\Commerce\OrderContract;

class PaymentController extends Controller
{
    /*
     * @var OrderContract
     */
    protected $orders;

    public function __construct(OrderContract $orders) {
        $this->orders = $orders;
    }

    public function gateway(Request $request)
    {
        $options = $request->except('gateway');

        $response = Omnipay::purchase($options)->send();

        return redirect($response->getRedirectUrl());
    }

    public function webReturn(Request $request)
    {
        $options  = ['request_params' => $request->all()];
        $gateway  = Omnipay::gateway('alipay');
        $response = $gateway->completePurchase($options)->send();

        if ($response->isSuccessful() && $response->isTradeStatusOk()) {
            $order_no = $request->get('out_trade_no');
            $order = Order::where('order_no', $order_no)->firstOrFail();
            $this->orders->paymentSuccess($order);

            return redirect()->route('order.payment.success', compact('order_no'));
        } else {
            // TODO 美化支付失败页面
            return '对不起, 由于未知原因导致支付失败, 请重试.';
        }
    }

    public function webNotify(Request $request)
    {
        return $this->webReturn($request);
    }
}
