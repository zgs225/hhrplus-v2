@foreach(\App\Models\PackageGood::all() as $packageGood)
<div class="modal fade" id="product-modal-{{ $packageGood->id }}" tabindex="-1" role="dialog" aria-labelledby="product-label-{{ $packageGood->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="product-label-{{ $packageGood->id }}">购买{{ $packageGood->name }}</h4>
      </div>
      {!! Form::open(['url' => route('orders.store'), 'method' => 'POST', 'novalidate' => true]) !!}
      <div class="modal-body">
        {!! Form::hidden('package_good_id', $packageGood->id) !!}
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_name', '姓名') !!}
            {!! Form::text('buyer_name', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请填写姓名']) !!}
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_email', '邮箱') !!}
            {!! Form::email('buyer_email', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请填写电子邮箱', 'data-validation-email-message' => '电子邮箱地址格式错误']) !!}
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::label('buyer_telephone', '手机') !!}
            {!! Form::text('buyer_telephone', null, ['class' => 'form-control', 'required' => true, 'data-validation-regex-regex' => '\d{11}', 'data-validation-regex-message' => '请输入正确的手机号，目前只支持中国地区', 'data-validation-required-message' => '请填写手机号码']) !!}
            <p class="help-block text-danger"></p>
          </div>
        </div>

        <!-- 图形验证码和短信验证码 -->
        <div class="form-group control-group">
          <div class="controls">
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
        <div class="form-group control-group">
          <div class="controls">
            {!! Form::text('smscode', null, ['class' => 'form-control', 'required' => true, 'data-validation-required-message' => '请输入短信验证码', 'placeholder' => '短信验证码']) !!}
            <p class="help-block text-danger"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary btn-flat">前往支付</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endforeach
