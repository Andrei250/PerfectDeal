@extends('layouts.app')

@section('headscripts')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection

@section('content')


    <div id="register-carousel" class="carousel slide" data-interval="false">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="card-header mb-3">{{ __('Bine ați venit!') }}</div>

                            <div class="col-md-11 mx-auto" id="error-slide-1" style="display:none">
                                <p class="alert alert-danger">
                                    Toate campurile sunt obligatorii
                                </p>
                            </div>

                            <!-- Name -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="name" class="fadeIn first" type="text" name="name"
                                             :value="old('name')"
                                             required autocomplete="name" placeholder="Numele companiei"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Numele companiei'"
                                    ></x-input>

                                    @error('name')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="email" class="fadeIn second" type="email" name="email"
                                             :value="old('email')" required
                                             autocomplete="email" placeholder="Email-ul companiei"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Email-ul companiei'"></x-input>

                                    @error('email')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="phone" class="fadeIn second" type="tel" name="phone"
                                             :value="old('phone')" required
                                             autocomplete="phone" placeholder="Telefon"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Telefon'"></x-input>

                                    @error('phone')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="address" class="fadeIn second" type="text" name="address"
                                             :value="old('address')" required
                                             autocomplete="address" placeholder="Adresa companiei"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Adresa companiei'"></x-input>

                                    @error('address')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Already registered? -->
                            <div class="form-group row align-items-center fadeIn third">
                                <div class="col-md-5">
                                    <a class="btn btn-link" href="{{ route('login') }}"> {{ __('Am deja cont!') }} </a>
                                </div>
                            </div>

                            <!-- Next Slide Button -->
                            <div class="form-group row col-md-12 mx-auto d-flex flex-row-reverse" >
                                <a id="first-button-carousel"
                                   class="btn btn-primary col-md-3 fadeIn fourth"
                                   href="#register-carousel"
                                   role="button"
                                   data-slide="next">Înainte</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="card-header mb-3">{{ __('Bine ați venit!') }}</div>

                            <div class="col-md-11 mx-auto" id="error-slide-2" style="display:none">
                                <p class="alert alert-danger">
                                    Toate campurile sunt obligatorii
                                </p>
                            </div>

                            <!-- Caen Code -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="caen_code" class="fadeIn first" type="text" name="caen_code"
                                             :value="old('caen_code')" required
                                             autocomplete="caen_code" placeholder="Codul Caen"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Codul Caen'"></x-input>
                                    @error('caen_code')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- CIF -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="cif" class="fadeIn first" type="text" name="cif" :value="old('cif')"
                                             required
                                             autocomplete="cif" placeholder="CIF/CUI"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'CIF/CUI'"></x-input>

                                    @error('cif')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Com Reg -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="com_reg" class="fadeIn first" type="text" name="com_reg"
                                             :value="old('com_reg')" required
                                             autocomplete="com_reg" placeholder="Numarul de Ordine în R.C."
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Numarul de Ordine în R.C.'"></x-input>

                                    @error('com_reg')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Already registered? -->
                            <div class="form-group row align-items-center fadeIn second">
                                <div class="col-md-5">
                                    <a class="btn btn-link"
                                       href="{{ route('login') }}">
                                        {{ __('Am deja cont!') }}
                                    </a>
                                </div>
                            </div>


                            <div class="form-group col-md-12 mx-auto d-flex justify-content-between align-items-center">

                                <!-- Back Slide Button -->
                                <div class="d-flex flex-row">
                                    <a class="btn btn-primary col-md-12 fadeIn third" href="#register-carousel"
                                       role="button"
                                       data-slide="prev">Înapoi</a>
                                </div>

                                <!-- Next Slide Button -->
                                <div class="d-flex flex-row-reverse">
                                    <a id="second-button-carousel"
                                       class="btn btn-primary col-md-12 mx-auto fadeIn third"
                                       href="#register-carousel"
                                       role="button"
                                       data-slide="next">Înainte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="card-header mb-3">{{ __('Bine ați venit!') }}</div>

                            <!-- Password -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="password" class="fadeIn first"
                                             type="password"
                                             name="password"
                                             required
                                             autocomplete="new-password" placeholder="Parola"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Parola'"></x-input>

                                    @error('password')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="password_confirmation" class="fadeIn first"
                                             type="password"
                                             name="password_confirmation" required
                                             autocomplete="password-confirmation" placeholder="Confirmați Parola"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Confirmați Parola'"></x-input>

                                    @error('password_confirmation')
                                    <br>
                                        <span class="text-danger" role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Already registered? -->
                            <div class="form-group row align-items-center fadeIn second">
                                <div class="col-md-5">
                                    <a class="btn btn-link"
                                       href="{{ route('login') }}">
                                        {{ __('Am deja cont!') }}
                                    </a>
                                </div>
                            </div>

                            <div class="form-group col-md-12 mx-auto d-flex justify-content-between align-items-center">

                                <!-- Back Slide Button -->
                                <div class="d-flex flex-row">
                                    <a class="btn btn-primary col-md-12 fadeIn third" href="#register-carousel"
                                       role="button"
                                       data-slide="prev">Înapoi</a>
                                </div>

                                <!-- Register Button -->
                                <x-button class="btn btn-primary">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>

        function switchOffErrors() {
            $('#error-slide-1').css('display', 'none');
            $('#error-slide-2').css('display', 'none');
        }

        $('#first-button-carousel').click(function(e) {
            switchOffErrors();

            if ($('#name').val() === '' || $('#email').val()=== '' || $('#phone').val() === '' || $('#address').val() === '') {
                $('#error-slide-1').css('display', 'block');
                e.preventDefault();
                e.stopPropagation();
            } else {
                switchOffErrors();
            }
        });

        $('#second-button-carousel').click(function(e) {
            switchOffErrors();

            if ($('#caen_code').val() === '' || $('#cif').val() === '' || $('#com_reg').val() === '') {
                $('#error-slide-2').css('display', 'block');
                e.preventDefault();
                e.stopPropagation();
            } else {
                switchOffErrors();
            }
        });
    </script>
@endsection
