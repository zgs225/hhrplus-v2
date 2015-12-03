@extends('frontend.layouts.master')

@section ('title')
购买{{ $packageGood->name }} - 合伙人+
@stop

@section ('content')
<div class="row">
  <div class="container-fluid bg-gray">
    <div class="hhrplus-container">
      <div class="hhrplus-order-confirmed-container">
        <h4 class="order-confirmed-title text-primary">
          确认订单信息
        </h4>
      </div>

      <div class="hhrplus-divider-dashed"></div>

      {!! Form::open(['url' => route('orders.store'), 'method' => 'POST', 'novalidate' => true, 'class' => 'form-horizontal']) !!}
        {!! Form::hidden('package_good_id', $packageGood->id) !!}
      <div class="hhrplus-order-confirmed-container">
        <div class="form-group">
          <label class="col-sm-2 control-label">商品名称:</label>
          <div class="col-sm-6">
            <p class="form-control-static">
              {{ $packageGood->name }}
            </p>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">商品单价:</label>
          <div class="col-sm-6">
            <p class="form-control-static hhrplus-product-price">
              {{ money_format('%.0n', $packageGood->goodItems()->sum('price')) }}元
              @if (in_array($packageGood->id, [1, 2]))
              /次
              @endif
              @if (in_array($packageGood->id, [3, 4, 5, 6]))
                <span class="text-gray">
                  (原价: {{ money_format('%.0n', $packageGood->original_price) }}元)
                </span>
              @endif
            </p>
          </div>
        </div>
      </div>

      <div class="hhrplus-divider-dashed"></div>

      <div class="hhrplus-order-confirmed-container">
        <div class="form-group">
            <p class="text-muted form-control-static">为了更好的为您服务，请认真填写您的信息</p>
        </div>
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_name', '姓名:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              {!! Form::text('buyer_name', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请填写姓名']) !!}
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>

        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_email', '邮箱:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              {!! Form::email('buyer_email', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请填写电子邮箱', 'data-validation-email-message' => '电子邮箱地址格式错误']) !!}
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>

        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_telephone', '手机号码:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              {!! Form::text('buyer_telephone', null, ['class' => 'form-control', 'required' => true, 'data-validation-regex-regex' => '\d{11}', 'data-validation-regex-message' => '请输入正确的手机号，目前只支持中国地区', 'data-validation-required-message' => '请填写手机号码']) !!}
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>

        <!-- 图形验证码和短信验证码 -->
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('captcha', '验证码:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              <div class="input-group">
                <div class="hhrplus-add-on">
                  {!! Form::text('captcha', null, ['class' => 'form-control captcha-drop-target', 'placeholder' => '输入图形验证码后获取短信验证码', 'required' => true, 'data-validation-required-message' => '请填写图形验证码', 'id' => 'captcha-' . $packageGood->id]) !!}
                </div>
                <span class="input-group-btn">
                  <button class="btn btn-default btn-primary btn-flat captcha-btn" type="button" disabled>短信验证码</button>
                </span>
              </div>
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>

        <div class="form-group control-group">
          <div class="controls">
            <div class="col-sm-6 col-sm-offset-2">
              {!! Form::text('smscode', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请输入短信验证码', 'placeholder' => '短信验证码']) !!}
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
      </div>

      <div class="hhrplus-divider-dashed"></div>

      <div class="hhrplus-order-confirmed-container">
        <div class="form-group">
            <p class="text-muted form-control-static">发票信息</p>
        </div>
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('bill_type', '发票类型:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="bill_type" value="1" checked> 普通发票
              </label>
              <label class="radio-inline">
                <input type="radio" name="bill_type" value="2"> 增值税发票
              </label>
            </div>
          </div>
        </div>

        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('bill_header_type', '发票抬头:', ['class' => 'control-label col-sm-2']) !!}
            <div class="col-sm-6">
              <label class="radio-inline">
                <input type="radio" name="bill_header_type" value="1" checked> 个人
              </label>
              <label class="radio-inline">
                <input type="radio" name="bill_header_type" value="2"> 单位
              </label>
              <br>
              <br>
              {!! Form::text('bill_header', null, ['class' => 'form-control']) !!}
            </div>
          </div>
        </div>
      </div>

      <div class="hhrplus-order-confirmed-container">
        <div class="form-group hhrplus-buy-actions">
          <div class="col-sm-offset-2 col-sm-6">
            <button class="btn btn btn-primary btn-hhrplus btn-block" type="submit">
              提交付款
            </button>
          </div>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop
