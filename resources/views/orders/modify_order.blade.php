@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form class="mx-auto" action="{{route('company.modifyOrder', ['order' => $order])}}" method="POST">
                @csrf

                @include('orders.order_form', ['title' => 'title-order',
                                                'description' => 'description-order',
                                                'quantity' => 'quantity-order',
                                                'min_quantity' => 'min_quantity-order',
                                                'price' => 'price-order',
                                                'expire_date' => 'expire_date-order',
                                                'first_title' => $order->title,
                                                'first_description' => $order->description,
                                                'first_quantity' => $order->quantity,
                                                'first_min_quantity' => $order->min_quantity,
                                                'first_price' => $order->price,
                                                'first_expire_date' => $order->expire_date])
            </form>
        </div>
    </div>
@endsection
