<div class="col-sm-6 col-xs-12">
  <div class="hhrplus-product-list-item">
    <div class="hhrplus-product-list-cover">
      <img class="img-responsive" src="/build/images/products/list/covers/l{{ $packageGood->id }}.png" alt="{{ $packageGood->name }}">
    </div>
    <div class="hhrplus-product-list-panel text-center">
      <h3>{{ $packageGood->name }}</h3>
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
      <div class="hhrplus-product-actions">
        <a class="btn btn-primary btn-hhrplus" href="{{ route('package_goods.buy', $packageGood->id) }}">
          立即购买
        </a>
        <a class="btn btn-default btn-hhrplus btn-gray" href="{{ route('package_goods.show', $packageGood->id) }}">
          查看详情
        </a>
      </div>
    </div>
  </div>
</div>
