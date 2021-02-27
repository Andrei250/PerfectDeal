@extends('layouts.app')

@section('content')

    @foreach($orders as $order)
        @include('orders.order_compoment', ['order' => $order])
    @endforeach
    {{$orders->links('vendor.pagination.bootstrap-4')}}


@endsection
