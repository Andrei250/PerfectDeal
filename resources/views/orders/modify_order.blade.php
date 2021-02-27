@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('company.modifyOrder', ['order' => $order])}}" method="POST">
                @csrf

                @include('orders.order_form', ['title' => 'title-order',
                                                'description' => 'description-order',
                                                'quantity' => 'quantity-order',
                                                'min_quantity' => 'min_quantity-order',
                                                'price' => 'price-order',
                                                'expire_date' => 'expire_date-order'])
            </form>
        </div>
    </div>
@endsection
