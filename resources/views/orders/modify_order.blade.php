@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="col col-md-8 mx-auto">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>

        <div class="row">


            <form class="mx-auto" action="{{route('company.modifyOrder', ['order' => $order])}}" method="POST">
                @csrf

                @include('orders.order_form', ['title' => 'title-order',
                                                'description' => 'description-order',
                                                'quantity' => 'quantity-order',
                                                'min_quantity' => 'min_quantity-order',
                                                'price' => 'price-order',
                                                'expire_date' => 'expire_date-order',
                                                'icon' => 'icon_order',
                                                'domain' => 'domain_modify',
                                                'category' => 'category_modify',
                                                'subcategory' => 'subcategory_modify',
                                                'img_path' => $order->getImgPath(),
                                                'first_title' => $order->title,
                                                'first_description' => $order->description,
                                                'first_quantity' => $order->quantity,
                                                'first_min_quantity' => $order->min_quantity,
                                                'first_price' => $order->price,
                                                'first_expire_date' => $order->expire_date,
                                                'for' => 'Modify'])

                <div class="form-group row">
                    <input type="submit" class="btn btn-success mx-auto mt-4" value="Salveaza">
                </div>
            </form>
        </div>
    </div>
@endsection
