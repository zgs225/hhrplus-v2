<div class="hhrplus-block bg-gray products clearfix">
  <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
    <div class="hhrplus-block-header">
      <h2>
        我们的产品
        <a href="{{ route('package_goods.index') }}" class="pull-right">查看全部</a>
      </h2>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        @include ('frontend.includes.products.product_1')
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        @include ('frontend.includes.products.product_3')
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        @include ('frontend.includes.products.product_4')
      </div>
    </div>
  </div>
</div>

@include ('frontend/includes/product_demos')
