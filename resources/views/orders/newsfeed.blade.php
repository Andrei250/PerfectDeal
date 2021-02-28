@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-around">
            @foreach($domains as $domain)
                <div class="d-flex flex-column align-items-center">
                    <img src="{{$domain->getIconPath()}}" class="rounded-circle col-md-12"/>

                    <h4 class="text-center font-weight-bold">{{$domain->getName()}}</h4>
                </div>
            @endforeach
        </div>
{{--        @foreach($orders as $order)--}}
{{--            @include('orders.order_component', ['order' => $order])--}}
{{--        @endforeach--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                {{$orders->links('vendor.pagination.bootstrap-4')}}--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>



@endsection

