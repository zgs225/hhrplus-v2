@extends('frontend.layouts.master')

@section ('title')
所有产品
@stop

@section ('content')
  <div class="row">
    <div class="hhrplus-block bg-gray products clearfix">
      <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
        <div class="hhrplus-block-header">
          <h2>
            轻聊
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_1')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_2')
          </div>
        </div>

        <div class="hhrplus-block-header">
          <h2>
            制作
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_3')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_4')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_5')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_6')
          </div>
        </div>

        <div class="hhrplus-block-header">
          <h2>
            开发
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_7')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_8')
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            @include ('frontend.includes.products.product_9')
          </div>
        </div>
      </div>
    </div>
  </div>

  @include ('frontend/includes/product_demos')
@stop
