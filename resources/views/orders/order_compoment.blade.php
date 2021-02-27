<div class="col col-md-7 bg-white rounded">
    <div class="float-left col col-md-3">
        <img class="img-fluid" src="{{!is_null($order) ? $order->getImgPath() : asset('storage/uploads/orders/default_order.png')}}"/>
    </div>

    <div class="float-left col col-md-9">

    </div>
</div>
