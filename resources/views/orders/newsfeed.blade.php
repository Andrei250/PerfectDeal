@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 mx-auto p-0 my-3">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control" placeholder="Cauta"/>
                </div>
            </div>
        </div>

        @foreach($orders as $order)
            @include('orders.order_component', ['order' => $order])
        @endforeach

        <div class="row">
            <div class="col-md-12">
                {{$orders->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>



@endsection
