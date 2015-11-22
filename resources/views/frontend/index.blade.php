@extends('frontend.layouts.master')

@section('content')
  <div class="row">
    @include ('frontend.index.slides')

    @include ('frontend.index.products')

    @include ('frontend.index.clients')

    @include ('frontend.index.partners')
  </div><!-- row -->
@endsection

@section ('after-scripts-end')
<script>
$('.hhrplus-slides').slick({
  'autoplay'      : true,
  'autoplaySpeed' : 4321,
  'lazyLoad'      : 'ondemand',
  'dots'          : true,
});

$('.hhrplus-clients, .hhrplus-partners').slick({
  'lazyLoad'       : 'ondemand',
  'slidesToShow'   : 4,
  'slidesToScroll' : 4,
  'responsive'     : [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
</script>
@stop
