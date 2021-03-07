@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-10 bg-white rounded mx-auto p-0">
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

                @if(count($requests) > 0)
                    <p>DA</p>
                @else
                    <p class="alert alert-warning m-0 w-100">
                        Nu aveti nicio comanda in sistem.
                    </p>
                @endif
            </div>


        </div>
    </div>
@endsection

@section('scripts')

@endsection
