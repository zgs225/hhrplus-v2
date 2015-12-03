@extends('frontend.layouts.master')

@section ('title')
{{ $packageGood->name }} - 合伙人+
@stop

@section('content')
<div class="row">
  <div class="container-fluid bg-gray">
    <div class="hhrplus-detail-container">
      <div class="row hhrplus-detail-block">
        <div class="col-sm-6 col-xs-12">
          <div class="hhrplus-detail-img">
            <img src="/build/images/products/details/{{ $packageGood->id }}.png" alt="{{ $packageGood->name }}" class="img-responsive">
          </div>
        </div>
        <div class="col-sm-6 col-xs-12">
          <div class="hhrplus-detail-panel clearfix">
            <h2 class="hhrplus-detail-title">
              {{ $packageGood->name }}
            </h2>
            <div class="hhrplus-product-price">
              {{ money_format('%.0n', $packageGood->goodItems()->sum('price')) }}元
              @if (in_array($packageGood->id, [1, 2]))
              /次
              @endif
              @if (in_array($packageGood->id, [3, 4, 5, 6]))
                <span class="text-gray">
                  (原价: {{ money_format('%.0n', $packageGood->original_price) }}元)
                </span>
              @endif
            </div>
            <div class="hhrplus-product-actions hhrplus-detail-actions">
              <a class="btn btn-primary btn-hhrplus" href="{{ route('package_goods.buy', $packageGood->id) }}">
                立即购买
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="hhrplus-divider-dashed"></div>

      <div class="row hhrplus-detail-block">
        @include ('frontend.goods.show.includes.product_'.$packageGood->id)
      </div>

      <div class="hhrplus-divider-dashed"></div>

      <div class="row hhrplus-detail-block">
        <div class="hhrplus-detail-description">
          <h4>购买须知</h4>
          <ol>
            <li>订单确认：在您下单后我们的客服会在您下单后第一时间跟您预留有效的电话进行联系，同您核实订单的详细情况</li>
            <li>支付问题：如出现重复付款或银行扣款却显示未支付，请致电010-5287-2896进行咨询</li>
            <li>支付方式：平台只支持在线支付，请您进入产品页选择立即支付，按提示进行操作；目前在线支付支持微信、支付宝两种方式进行支付，可根据您的使用喜好进行选择</li>
            <li>退款须知：登陆合伙人+网站，进入“我的订单”，点击“申请退款”即可，提交成功后请耐心等待，由专业的售后工作人员受理您的申请，如已交付产品不可退款</li>
          </ol>
        </div>
      </div>

      <div class="hhrplus-divider-dashed"></div>

      <div class="row hhrplus-detail-block">
        <div class="hhrplus-detail-description">
          <h4>购买流程</h4>
          <img class="img-responsive" src="/build/images/buy-flow.png" alt="合伙人+购买流程">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
