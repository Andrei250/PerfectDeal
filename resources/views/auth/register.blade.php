@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group row">
                            <x-label for="name" :value="__('Nume')" />

                            <div class="col col-md-6">
                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />

                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4 form-group row">
                            <x-label for="email" :value="__('Email')" />

                            <div class="col col-md-6">
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="mt-4 form-group row">
                            <x-label for="phone" :value="__('Numar de Telefon')" />

                            <div class="col col-md-6">
                                <x-input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')" required />

                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="mt-4 form-group row">
                            <x-label for="address" :value="__('Adresa')" />

                            <div class="col col-md-6">
                                <x-input id="address" class="form-control" type="text" name="address" :value="old('address')" required />

                                @error('address')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Caen Code -->
                        <div class="mt-4 form-group row">
                            <x-label for="caen_code" :value="__('Cod Caen')" />

                            <div class="col col-md-6">
                                <x-input id="caen_code" class="form-control" type="text" name="caen_code" :value="old('caen_code')" required />

                                @error('caen_code')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- CIF -->
                        <div class="mt-4 form-group row">
                            <x-label for="cif" :value="__('CIF')" />

                            <div class="col col-md-6">
                                <x-input id="cif" class="form-control" type="text" name="cif" :value="old('cif')" required />

                                @error('cif')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Com Reg -->
                        <div class="mt-4 form-group row">
                            <x-label for="com_reg" :value="__('Registrul Comertului')" />

                            <div class="col col-md-6">
                                <x-input id="com_reg" class="form-control" type="text" name="com_reg" :value="old('com_reg')" required />

                                @error('com_reg')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mt-4 form-group row">
                            <x-label for="password" :value="__('Parola')" />

                            <div class="col col-md-6">
                                <x-input id="password" class="form-control"
                                         type="password"
                                         name="password"
                                         required autocomplete="new-password" />

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4 form-group row">
                            <x-label for="password_confirmation" :value="__('Confirma Parola')" />

                            <div class="col col-md-6">
                                <x-input id="password_confirmation" class="form-control"
                                         type="password"
                                         name="password_confirmation" required />

                                @error('password_confirmation')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-around form-group mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button class="btn btn-primary">
                                {{ __('Register') }}
                            </x-button>
                        </div>

{{--                        <div class="form-group row mb-0 mb-0">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Register') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
