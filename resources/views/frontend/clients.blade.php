@extends('frontend.layouts.master')

@section ('title')
近期案例 - 合伙人+
@stop

@section('content')
<div class="row">
  <div class="container-fluid bg-gray">
    <div class="hhrplus-container">
      <div class="hhrplus-clients-header">
        <h4>网站</h4>
      </div>
      <div class="row">
        @foreach($websites as $client)
          @include ('frontend.clients.includes.list_item', ['client' => $client])
        @endforeach
      </div>
      <div class="hhrplus-clients-header">
        <h4>APP</h4>
      </div>
      <div class="row">
        @foreach($applications as $client)
          @include ('frontend.clients.includes.list_item', ['client' => $client])
        @endforeach
      </div>
      <div class="hhrplus-clients-header">
        <h4>微信</h4>
      </div>
      <div class="row">
        @foreach($weixins as $client)
          @include ('frontend.clients.includes.list_item', ['client' => $client])
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
