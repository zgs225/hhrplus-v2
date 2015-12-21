@extends('frontend.layouts.master')

@section ('title')
合伙人+，满足互联网初创项目从0到0.1的技术需求
@stop

@section('content')
  <div class="row">
    @include ('frontend.index.slides')

    @include ('frontend.index.products')

    @include ('frontend.index.partners')
  </div><!-- row -->
@endsection

@section ('after-scripts-end')
@if (!BrowserDetect::isDesktop())
<script>
$('.hhrplus-clients, .hhrplus-partners').slick({
  'lazyLoad'       : 'ondemand',
  'slidesToShow'   : 4,
  'slidesToScroll' : 4,
  'responsive'     : [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay      : true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay      : true,
        arrows: false
      }
    }
  ]
});
</script>
@endif

<script>
$('.hhrplus-slides').slick({
  'autoplay'      : true,
  'autoplaySpeed' : 4321,
  'lazyLoad'      : 'ondemand',
  'dots'          : true,
});

</script>
@stop
