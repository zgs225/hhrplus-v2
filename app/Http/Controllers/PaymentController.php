<?php

namespace App\Http\Controllers;

use Omnipay;
use Illuminate\Http\Request;

use App\Http\Requests;

class PaymentController extends Controller
{
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
