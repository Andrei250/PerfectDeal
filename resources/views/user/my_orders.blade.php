@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
                @forelse($orders as $order)
                    <div class="col col-md-12">
                        @include('orders.order_component', ['order' => $order, 'value' => 0])
                    </div>
                @empty
                    <p class="alert alert-warning m-0 w-100">
                        Nu aveti nicio comanda in sistem.
                    </p>
                @endforelse

                @if(count($orders) > 0)
                    {{$orders->links('vendor.pagination.bootstrap-4')}}
                @endif
        </div>
    </div>
@endsection
