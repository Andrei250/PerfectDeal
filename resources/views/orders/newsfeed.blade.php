@extends('layouts.app')

@section('content')

    @foreach($orders as $order)
        @include('orders.order_component', ['order' => $order])
        @include('orders.order_buy_modal', ['order' => $order])

    @endforeach
    {{$orders->links('vendor.pagination.bootstrap-4')}}


@endsection
