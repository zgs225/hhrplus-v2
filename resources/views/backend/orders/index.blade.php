@extends ('backend.layouts.master')

@section ('title', trans('menus.orders_management'))

@section('page-header')
    <h1>
        {{ trans('menus.orders_management') }}
        <small>{{ trans('menus.all_orders') }}</small>
    </h1>
@endsection

@section ('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a>
    </li>
    <li class="active">{!! link_to_route('admin.orders.index', trans('menus.orders_management')) !!}</li>
@stop

@section('content')
    @include('backend.orders.includes.partials.header-buttons')

    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>{{ trans('crud.orders.created_at') }}</th>
            <th>{{ trans('crud.orders.order_detail') }}</th>
            <th>{{ trans('crud.orders.buyer_detail') }}</th>
            <th>{{ trans('crud.orders.actual_amount') }}</th>
            <th>{{ trans('crud.orders.order_status') }}</th>
            <th>{{ trans('crud.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->created_at }}</td>
                <td>{!! $order->detail !!}</td>
                <td>{!! $order->buyer_detail !!}</td>
                <td>{{ rmb($order->actual_amount) }}</td>
                <td>{{ $order->current_status->status }}</td>
                <td>{!! $order->action_buttons !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        {!! $orders->total() !!} {{ trans('crud.orders.total') }}
    </div>

    <div class="pull-right">
        {!! $orders->render() !!}
    </div>

    <div class="clearfix"></div>
@stop
