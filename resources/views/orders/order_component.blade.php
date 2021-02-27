<div class="row my-2">
    <div class="col col-md-7 bg-white rounded mx-auto">
        <div class="float-left col col-md-3 h-auto">
            <img class="img-fluid" src="{{!is_null($order) ? $order->getImgPath() : asset('storage/uploads/orders/default_order.png')}}"/>
        </div>

        <div class="float-left col col-md-9 h-auto">
            <h3 class="font-weight-bold">{{!is_null($order) ? $order->getTitle() : "Fara Titlu"}}</h3>
            <p class="text-md-left my-2"> {{!is_null($order) ? $order->getDescription() : "Fara Descriere"}}</p>
            <p class="text-md-left my-2"> Stoc: {{!is_null($order) ? $order->getQuantity() : "Fara Cantitate"}}</p>
            <p class="text-md-left my-2"> Cantitate minima: {{!is_null($order) ? $order->getMinQuantity() : "Fara Cantitate Minima"}}</p>
            <p class="text-md-left my-2"> Expira la: {{!is_null($order) ? $order->getExpireDate() : "Nu are data de expirare"}}</p>
        </div>
    </div>
</div>
