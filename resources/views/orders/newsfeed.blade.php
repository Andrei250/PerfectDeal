@extends('layouts.app')

@section('content')

    @foreach($orders as $order)
        @include('orders.order_component', ['order' => $order, 'value' => 1])
    @endforeach
    {{$orders->links('vendor.pagination.bootstrap-4')}}


@endsection
