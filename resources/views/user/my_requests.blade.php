@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-10 rounded mx-auto p-0">
                <div class="alert alert-success" id="success-div-request" style="display:none;">
                    Request sters cu succes.
                </div>

                <div class="alert alert-danger" id="error-div-request" style="display:none;">
                    Ne pare rau, dar nu am putut sterge requestul. Daca persista, va rugam sa ne contactati.
                </div>

                @forelse($requests as $request)
                    <div class="bg-white rounded col col-md-8 mx-auto py-3" id="request-{{$request->id}}">
                        <p>Comanda: {{$request->order->id}}</p>
                        <p>Cantitate comandata: {{$request->quantity}}</p>
                        <p>Data de livrare: {{$request->getDeliveryDate()}}</p>

                        @if($request->getSelfTransport())
                            <p>Acest user a optat pentru ridicarea comenzii la data de {{$request->getPickupDate()}}</p>
                        @endif

                        <div class="w-100 d-flex justify-content-around">
                            <button class="btn btn-danger" onclick="deleteItem('{{$request->id}}')">
                                Refuza
                            </button>

                            <button class="btn btn-success">
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
    <script>
        const _token_request = $('meta[name="csrf-token"]').attr('content');
        const error_div = $('#error-div-request');
        const success_div = $('#success-div-request');

        function deleteItem(id) {
            let url = '{{route('user.refuseRequest', ['order_request' => ':tobereplaced'])}}';
            url = url.replace(':tobereplaced', id);
            error_div.css('display', 'none');
            success_div.css('display', 'none');

            if (confirm("Esti sigur ca doresti sa refuzi?")) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                      _token: _token_request,
                    },
                    success: function (response) {
                        if (response === 'error') {
                            error_div.css('display', 'block');
                        } else {
                            success_div.css('display', 'block');
                            $('#request-' + id).remove();
                        }
                    },
                });
            }
        }
    </script>
@endsection
