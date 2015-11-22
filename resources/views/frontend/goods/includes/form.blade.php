{!! Form::open(['url' => route('orders.store'), 'method' => 'POST']) !!}
{!! Form::hidden('package_good_id', $packageGood->id) !!}
<div class="form-group">
    {!! Form::label('buyer_name', '姓名') !!}
    {!! Form::text('buyer_name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('buyer_email', '邮箱') !!}
    {!! Form::email('buyer_email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('buyer_telephone', '手机') !!}
    {!! Form::email('buyer_telephone', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('购买', ['class' => 'btn btn-default btn-primary']) !!}
</div>
{!! Form::close() !!}
