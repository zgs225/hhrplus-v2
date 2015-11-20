@extends('frontend.layouts.master')

@section('content')
	<div class="row">
        @foreach($packageGoods as $good)
            <div class="col-md-4 text-center">
                <h3>{{ $good->name }}</h3>
                <p>{{ $good->body }}</p>
                <p>
                    <a href="{{route('package_goods.show', ['id' => $good->id])}}" class="btn btn-default btn-primary">
                        查看详情
                    </a>
                </p>
            </div>
        @endforeach
	</div><!-- row -->
@endsection
