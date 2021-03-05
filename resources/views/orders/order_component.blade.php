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
                    <div class="float-right">
                        <button class="btn btn-primary">
                            Cumpara
                        </button>

                        <button class="btn btn-outline-primary">
                            Negociaza
                        </button>
                    </div>
                </div>
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

