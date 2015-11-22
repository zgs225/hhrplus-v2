<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\OrderRequest;
use App\Repositories\Frontend\Commerce\OrderContract;

class OrderController extends Controller
{
    /*
     * @var OrderContract
     */
    protected $orders;

    public function __construct(OrderContract $orders) {
        $this->orders = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = $this->orders->create($request);

        return redirect()->action('PaymentController@gateway', [
            'gateway'      => 'alipay',
            'out_trade_no' => $order->order_no,
            'subject'      => '支付来自合伙人+的' . $order->orderItems()->lists('product_name')->implode(', ') .'订单',
            'total_fee'    => $order->actual_amount
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function payment_success($order_no)
    {
        $order = Order::with('orderItems', 'orderStatuses')->where('order_no', $order_no)->firstOrFail();

        return view('frontend.orders.payment_success', compact('order'))->with('status', '支付成功');
    }
}
