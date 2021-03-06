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
            <form id="add-new-product-form" class="mx-auto" action="{{route('company.addNewOrder')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('orders.order_form', ['title' => 'title',
                                                 'description' => 'description',
                                                 'quantity' => 'quantity',
                                                 'min_quantity' => 'min_quantity',
                                                 'price' => 'price',
                                                 'expire_date' => 'expire_date',
                                                 'domain' => 'domain_add',
                                                 'category' => 'category_add',
                                                 'subcategory' => 'subcategory_add',
                                                 'icon' => 'icon',
                                                 'first_title' => '',
                                                 'first_description' => '',
                                                 'first_quantity' => '',
                                                 'first_min_quantity' => '',
                                                 'first_price' => '',
                                                 'first_expire_date' => '',
                                                 'for' => 'Add'])

                <div class="form-group row">
                    <input type="submit" class="btn btn-success mx-auto mt-4" value="Salveaza">
                </div>
            </form>
        </div>
    </div>
@endsection
