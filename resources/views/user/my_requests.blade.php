@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-10 rounded mx-auto p-0">
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

                @forelse($requests as $request)
                    <div class="bg-white rounded col col-md-8 mx-auto py-3">
                        <p>Comanda: {{$request->order->id}}</p>
                        <p>Cantitate comandata: {{$request->quantity}}</p>
                        <p>Data de livrare: {{$request->getDeliveryDate()}}</p>

                        @if($request->getSelfTransport())
                            <p>Acest user a optat pentru ridicarea comenzii la data de {{$request->getPickupDate()}}</p>
                        @endif

                        <div class="w-100 d-flex justify-content-around">
                            <button class="btn btn-danger" id="refuse-btn-{{$request->id}}">
                                Refuza
                            </button>

                            <button class="btn btn-success" id="accept-btn-{{$request->id}}">
                                Accepta
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="alert alert-warning m-0 w-100">
                        Nu aveti nicio comanda in sistem.
                    </p>
                @endforelse
            </div>


        </div>
    </div>
@endsection

@section('scripts')

@endsection
