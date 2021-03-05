<link href="{{asset('css/order_form_style.css')}}" rel="stylesheet">

<div>
    <h3>Modifică anunț</h3>
</div>

<!-- Title -->
<div class="bg-white rounded order-form px-5 py-3 my-3">
    <div class="form-group row">
        <label for="{{$title}}" class="col-md-10 col-form-label text-md-left">{{ __('Titlu') }}</label>

        <div class="col-md-12">
            <input id="{{$title}}" type="text" class="form-control @error($title) is-invalid @enderror"
                   name="{{$title}}"
                   value="{{ is_null(old($title)) ? $first_title : old($title) }}" required autofocus>

            @error($title)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<!-- Price -->
<div class="bg-white rounded order-form px-5 py-3 my-3">
    <div class="form-group row">
        <label for="{{$price}}" class="col-md-10 col-form-label text-md-left">{{ __('Pret per unitate') }}</label>

        <div class="col-md-12">
            <input id="{{$price}}" type="number" class="form-control @error($price) is-invalid @enderror"
                   name="{{$price}}"
                   value="{{ is_null(old($price)) ? $first_price : old($price) }}" required autofocus>

            @error($price)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<!-- Quantity & minimum quantity -->
<div class="bg-white rounded order-form px-5 py-3 my-3">
    <div class="form-group row mb-4">
        <label for="{{$quantity}}" class="col-md-10 col-form-label text-md-left">{{ __('Cantitate') }}</label>

        <div class="col-md-12">
            <input id="{{$quantity}}" type="number" class="form-control @error($quantity) is-invalid @enderror"
                   name="{{$quantity}}" value="{{ is_null(old($quantity)) ? $first_quantity : old($quantity) }}"
                   required
                   autofocus>

            @error($quantity)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="{{$min_quantity}}"
               class="col-md-10 col-form-label text-md-left">{{ __('Cantitate minima de cumparare') }}</label>

        <div class="col-md-12">
            <input id="{{$min_quantity}}" type="number"
                   class="form-control @error($min_quantity) is-invalid @enderror"
                   name="{{$min_quantity}}"
                   value="{{ is_null(old($min_quantity)) ? $first_min_quantity : old($min_quantity) }}" required
                   autofocus>

            @error($min_quantity)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<!-- Expiration date -->
<div class="bg-white rounded order-form px-5 py-3 my-3">
    <div class="form-group row">
        <label for="{{$expire_date}}"
               class="col-md-10 col-form-label text-md-left">{{ __('Data expirarii') }}</label>
        <div class="col-md-12">
            <input class="form-control @error($expire_date) is-invalid @enderror" type="date" id="{{$expire_date}}"
                   name="{{$expire_date}}"
                   value="{{is_null(old($expire_date)) ? $first_expire_date : old($expire_date)}}"
                   required autofocus>

            @error($expire_date)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<!-- Description -->
<div class="bg-white rounded order-form px-5 py-3 my-3">
    <div class="form-group row">
        <label for="{{$description}}" class="col-md-10 col-form-label text-md-left">{{ __('Descriere') }}</label>

        <div class="col-md-12">
        <textarea id="{{$description}}" type="text" class="form-control @error($description) is-invalid @enderror"
                  name="{{$description}}" required
                  autofocus>{{ is_null(old($description)) ? $first_description : old($description) }}</textarea>

            @error($description)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<!-- Images -->
<div class="bg-white rounded order-form px-5 py-5 my-3">
    @if (isset($img_path))
        <div >
            Imagine curenta:<br>
            <img src="{{$img_path}}" class="img-fluid col-md-10 col-form-label text-md-left"/>
        </div>

    @endif

    <div class="form-control custom-file">
        <input type="file" class="custom-file-input" id="{{$icon}}" name="{{$icon}}">
        <label class="custom-file-label" for="{{$icon}}">Poza</label>
    </div>
</div>
