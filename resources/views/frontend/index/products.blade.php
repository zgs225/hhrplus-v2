<div class="hhrplus-block bg-gray products clearfix">
  <div class="container">
    @include ('frontend.includes.products.product_1')
    @include ('frontend.includes.products.product_3')
    @include ('frontend.includes.products.product_4')

    <p class="text-center">
      <a class="text-primary" href="{{ route('package_goods.index') }}">
        查看全部产品>
      </a>
    </p>
  </div>
</div>

@include ('frontend/includes/product_demos')
