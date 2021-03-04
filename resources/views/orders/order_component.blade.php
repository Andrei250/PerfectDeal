<link href="{{asset('css/order_card_style.css')}}" rel="stylesheet">

<div class="row my-4">
    <div class="col col-md-7 bg-white rounded mx-auto">
        <div class="float-left col col-md-3 h-auto py-3">
            <img class="img-fluid"
                 src="{{!is_null($order) ? $order->getImgPath() : asset('storage/uploads/orders/default_order.png')}}"/>
        </div>

        <div class="float-left col col-md-9 h-auto">
            <div class="align-items-md-center d-flex justify-content-between">
                <div class="mb-4 mt-3 align-items-center">
                    <h4 class="text-md-left mb-1">{{!is_null($order) ? $order->getTitle() : "Fara Titlu"}}</h4>
                    <h4 class="font-weight-bold"> Pret: {{!is_null($order) ? $order->getPrice() : "Fara pret"}}</h4>
                </div>
                <div onclick="checkItem(this)" data-value="1" class="heart"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <p class="text-md-left mb-1"> {{!is_null($order) ? $order->getDescription() : "Fara Descriere"}}</p>
                    <p class="text-md-left mb-1">
                        Stoc: {{!is_null($order) ? $order->getQuantity() : "Fara Cantitate"}}</p>
                    <p class="text-md-left mb-1"> Cantitate
                        minima: {{!is_null($order) ? $order->getMinQuantity() : "Fara Cantitate Minima"}}</p>
                    <p class="text-md-left m-0"> Expira
                        la: {{!is_null($order) ? $order->getExpireDate() : "Nu are data de expirare"}}</p>
                </div>
                <div class="mt-auto">
                    <div class="float-right btn-group">
                        <button class="btn btn-primary custom-width" data-toggle="modal" data-target="#mod">
                            Cumpara
                        </button>

                        <button class="btn btn-outline-primary custom-width">
                            Negociaza
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ !is_null($order) ? $order->getTitle() : "Fara Titlu" }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkItem(element) {
        console.log(element.classList);
        element.classList.add("heart-beat");
    }
</script>

