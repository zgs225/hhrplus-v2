@extends('frontend.layouts.master')

@section ('title')
所有产品 - 合伙人+
@stop

@section ('content')
<div class="row">
  <div class="container-fluid bg-gray">
    <div class="hhrplus-container">
      <div class="hhrplus-products-header">
        <h4>轻聊</h4>
      </div>
      <div class="row">
        @foreach($talks as $packageGood)
          @include ('frontend.goods.includes.list_item', ['packageGood' => $packageGood])
        @endforeach
      </div>

      <div class="hhrplus-products-header">
        <h4>开发前</h4>
      </div>
      <div class="row">
        @foreach($makes as $packageGood)
          @include ('frontend.goods.includes.list_item', ['packageGood' => $packageGood])
        @endforeach
      </div>

      <div class="hhrplus-products-header">
        <h4>开发</h4>
      </div>
      <div class="row">
        @foreach($devs as $packageGood)
          @include ('frontend.goods.includes.list_item', ['packageGood' => $packageGood])
        @endforeach
      </div>
    </div>
  </div>
</div>
@stop
