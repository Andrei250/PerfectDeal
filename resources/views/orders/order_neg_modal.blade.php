<div class="modal fade" id="negociere-modal-order-{{$order->id}}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h4 class="modal-title"
                    id="exampleModalLongTitle">{{ !is_null($order) ? $order->getTitle() : "Fara Titlu" }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="errors-div-neg-{{$order->id}}">

            </div>

            <div class="px-4 pt-4 float-left">
                <h5>Trimiteți vânzatorului oferta dumneavoastră</h5>
            </div>
            <form id="neg-form-{{$order->id}}">
                <div class="modal-body w-100 d-flex justify-content-center">
                    <label>
                        <textarea type="text" id="description-neg-{{$order->id}}" class="form-control" cols="50" rows="10"></textarea>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Anulează</button>
                    <button type="button" id="submit-neg-{{$order->id}}" class="btn btn-primary">Trimite</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#submit-neg-{{$order->id}}').click(function (e){
        let descrip{{$order->id}} = $('#description-neg-{{$order->id}}').val();
        let url_neg{{$order->id}} = '{{route('order.makeNeg', ['order' => ':tobereplaced'])}}';
        url_neg{{$order->id}} = url_neg{{$order->id}}.replace(':tobereplaced', '{{$order->id}}');

        $.ajax({
            url: url_neg{{$order->id}},
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                'description': descrip{{$order->id}},
            },
            success: function(response) {
                $('#neg-form-{{$order->id}}')[0].reset();
                $('#errors-div-neg-{{$order->id}}').html(response);
            }
        });

    })
</script>
