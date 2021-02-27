@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <form action="{{route('company.modifyOrder', ['order' => $order])}}" method="POST">
                @csrf

                @include('orders.order_form')
            </form>
        </div>
    </div>
@endsection
