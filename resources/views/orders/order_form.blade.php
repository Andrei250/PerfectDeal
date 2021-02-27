<div class="form-group row">
    <label for="{{$title}}" class="col-md-4 col-form-label text-md-right">{{ __('Titlu') }}</label>

    <div class="col-md-6">
        <input id="{{$title}}" type="text" class="form-control @error($title) is-invalid @enderror" name="{{$title}}" value="{{ old($title) }}" required autofocus>

        @error($title)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="{{$description}}" class="col-md-4 col-form-label text-md-right">{{ __('Descriere') }}</label>

    <div class="col-md-6">
        <textarea id="{{$description}}" type="text" class="form-control @error($description) is-invalid @enderror" name="{{$description}}" required autofocus>{{ old($description) }}</textarea>

        @error($description)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="{{$quantity}}" class="col-md-4 col-form-label text-md-right">{{ __('Cantitate') }}</label>

    <div class="col-md-6">
        <input id="{{$quantity}}" type="number" class="form-control @error($quantity) is-invalid @enderror" name="{{$quantity}}" value="{{ old($quantity) }}" required autofocus>

        @error($quantity)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="{{$min_quantity}}" class="col-md-4 col-form-label text-md-right">{{ __('Cantitate minima de cumparare') }}</label>

    <div class="col-md-6">
        <input id="{{$min_quantity}}" type="number" class="form-control @error($min_quantity) is-invalid @enderror" name="{{$min_quantity}}" value="{{ old($min_quantity) }}" required autofocus>

        @error($min_quantity)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="{{$price}}" class="col-md-4 col-form-label text-md-right">{{ __('Pret per unitate') }}</label>

    <div class="col-md-6">
        <input id="{{$price}}" type="number" class="form-control @error($price) is-invalid @enderror" name="{{$price}}" value="{{ old($price) }}" required autofocus>

        @error($price)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="{{$expire_date}}" class="col-md-4 col-form-label text-md-right">{{ __('Data expirarii') }}</label>
    <div class="col-md-6">
        <input class="form-control @error($expire_date) is-invalid @enderror" type="date" id="{{$expire_date}}" name="{{$expire_date}}" required autofocus>

        @error($expire_date)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="custom-file">
    <input type="file" class="custom-file-input" id="icon" name="icon">
    <label class="custom-file-label" for="icon">Poza</label>
</div>
