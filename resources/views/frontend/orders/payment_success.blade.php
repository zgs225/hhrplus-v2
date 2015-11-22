@extends('frontend.layouts.master')

@section ('content')
<div class="row">
  <div class="hhrplus-block bg-gray clearfix">
    <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <div class="hhrplus-block-header">
            <h2>
              <i class="fa fa-check-circle-o text-success"></i>
              支付成功
            </h2>
          </div>

          <div class="alert alert-success">
            <p>支付成功，感谢您购买合伙人+的产品</p>
            <p>请务必保存您的订单号：</p>
            <p><strong>{{ $order->order_no }}</strong></p>
            <p>稍后，我们将和您联系</p>
          </div>
        </div>
        <div class="col-sm-6 col-xs-12">
          <h2>
            <i class="fa fa-list-alt"></i>
            订单信息
          </h2>
          <ul class="hhrplus-order-info">
            <li>
              <i class="fa fa-hand-o-right fa-fw"></i>
              <span>
                {{ $order->order_no }}
              </span>
            </li>
            <li>
              <i class="fa fa-user fa-fw"></i>
              <span>
                {{ $order->buyer_name }}
              </span>
            </li>
            <li>
              <i class="fa fa-envelope-o fa-fw"></i>
              <span>
                {{ $order->buyer_email }}
              </span>
            </li>
            <li>
              <i class="fa fa-fax fa-fw"></i>
              <span>
                {{ $order->buyer_telephone }}
              </span>
            </li>
            @foreach($order->orderItems as $orderItem)
              <li>
                <i class="fa fa-circle-o fa-fw"></i>
                <span>
                  {{ $orderItem->product_name }}
                </span>
              </li>
              <li>
                <i class="fa fa-cny fa-fw"></i>
                <span>
                  {{ money_format('%.2n', $orderItem->actual_amount) }}
                </span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
