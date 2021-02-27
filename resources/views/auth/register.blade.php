@extends('layouts.app')

@section('headscripts')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection

@section('content')


    <div id="carouselExampleIndicators" class="carousel slide" data-interval="false">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="card-header">{{ __('Bine ați venit!') }}</div>

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
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                            <div class="form-group row col-md-12 mx-auto d-flex flex-row-reverse ">
                                <a class="btn btn-primary col-md-3 fadeIn fourth"
                                   href="#carouselExampleIndicators"
                                   role="button"
                                   data-slide="next">Înainte</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="wrapper fadeInDown">
                        <div id="formContent">
                            <div class="card-header">{{ __('Bine ați venit!') }}</div>

                            <!-- Caen Code -->
                            <div class="form-group row">
                                <div class="col-md-12 mx-auto">
                                    <x-input id="caen_code" class="fadeIn first" type="text" name="caen_code"
                                             :value="old('caen_code')" required
                                             autocomplete="caen_code" placeholder="Codul Caen"
                                             onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = 'Codul Caen'"></x-input>

                                    @error('caen_code')
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                                    <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
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
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                    <a class="btn btn-primary col-md-12 fadeIn third" href="#carouselExampleIndicators"
                                       role="button"
                                       data-slide="prev">Înapoi</a>
                                </div>

                                <!-- Next Slide Button -->
                                <div class="d-flex flex-row-reverse">
                                    <a class="btn btn-primary col-md-12 mx-auto fadeIn third"
                                       href="#carouselExampleIndicators"
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
                            <div class="card-header">{{ __('Bine ați venit!') }}</div>

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
                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
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
                                    <span class="text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
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
                                    <a class="btn btn-primary col-md-12 fadeIn third" href="#carouselExampleIndicators"
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
