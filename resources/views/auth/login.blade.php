@extends('layouts.app')

@section('headscripts')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('css/form_login_style.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="card-header">{{ __('Bine ați venit!') }}</div>

            <form class="py-4" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12 mx-auto">
                        <input id="login" type="text" class="fadeIn second @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                               onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Email'">

                        @error('email')

                        <span class="invalid-feedback fadeIn second" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 mx-auto">
                        <input id="password" type="password"
                               class="fadeIn third @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password" placeholder="Parola"
                               onfocus="this.placeholder = ''"
                               onblur="this.placeholder='Parola'">

                        @error('password')

                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <div class="col-md-6 fadeIn fourth">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Ține-mă minte') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 fadeIn fourth">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Am uitat parola?') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary fadeIn third col-md-4">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
