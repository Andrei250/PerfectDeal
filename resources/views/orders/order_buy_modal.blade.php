
<div class="modal fade" id="modal-order-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="row ">
                    <div class="col-md-8">
                        <h5 class="text-left">{{ !is_null($order) ? $order->getTitle() : "Fara Titlu" }}</h5>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-right"> Pret: {{!is_null($order) ? $order->getPrice() : "Fara Pret" }}/buc</h5>
                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
{{--                    <form id="request-form-{{$order->id}}" action="{{route('order.makeRequest', ["order"=>$order])}}" method="POST">--}}
{{--                        @csrf--}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Cantitate dorita:</span>
                            </div>
                            <input type="number" class="form-control"  id="quantity-{{$order->id}}" name="quantity" min="{{!is_null($order) ? $order->getMinQuantity() : 0 }}" max="{{!is_null($order) ? $order->getQuantity() : 0 }}">
                        </div>

                        <div class="input-group input-group mb-3">
                            <div style="height: 37px" class="input-group-prepend">
                                <span class="input-group-text">Data livrare:</span>
                            </div>
                            <input type="date" class="form-control"  id="date-{{$order->id}}" name="date" max="{{!is_null($order) ? $order->getExpireDate() : 2100-12-31 }}"><br><br>
                        </div>

                        <label for="transport">Transport asigurat de mine: <br>(introduceti data cand doriti sa ridicati marfa)</label>
                        <div class="input-group mb-3">
                            <div style="height: 37px"class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" id="pickup-option-{{$order->id}}"name="pickup-option" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            <input type="date" id="pickup-date-{{$order->id}}" class="form-control" placeholder="Data in care doresc sa ridic marfa."  name="date-pickup" max="{{!is_null($order) ? $order->getExpireDate() : 2100-12-31 }}"><br><br>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuleaza</button>
                <button id="submit-request-{{$order->id}}" type="button" class="btn btn-primary">Plaseaza comanda</button>
            </div>
        </div>
    </div>
</div>

<script>
    const _token{{$order->id}} = $('meta[name="csrf-token"]').attr('content');

    $('#submit-request-{{$order->id}}').click(function (e){
        let quantity{{$order->id}} = $('#quantity-{{$order->id}}').val();
        let date{{$order->id}} = $('#date-{{$order->id}}').val();
        let pickupOption{{$order->id}} = $('#pickup-option-{{$order->id}}').is(":checked");
        let pickupDate{{$order->id}} = $('#pickup-date-{{$order->id}}').val();
        let url{{$order->id}} = '{{route('order.makeRequest', ['order' => ':tobereplaced'])}}';
        url{{$order->id}} = url{{$order->id}}.replace(':tobereplaced', '{{$order->id}}');

        $.ajax({
            url: url{{$order->id}},
            type: "POST",
            data: {
                _token: _token{{$order->id}},
                'quantity': quantity{{$order->id}},
                'date': date{{$order->id}},
                'pickup-option': pickupOption{{$order->id}},
                'pickup-date': pickupDate{{$order->id}},
            },
            success: function(response) {
                console.log(response);
            }
        });

    })
</script>
