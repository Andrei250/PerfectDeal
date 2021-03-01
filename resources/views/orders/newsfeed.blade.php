@extends('layouts.app')

@section('headscripts')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-around w-100 h-auto mb-4">
            @foreach($domains as $domain)
                <div class="d-flex flex-column align-items-center h-auto">
                    <img src="{{$domain->getIconPath()}}" class="rounded-circle col-md-8" style="cursor:pointer" onclick="getDomain('{{$domain->getSlug()}}')"/>

                    <h4 class="text-center font-weight-bold">{{$domain->getName()}}</h4>
                </div>
            @endforeach
        </div>

        <div class="row col-md-9 mx-auto">
            <div class="col-md-5">
                <select class="form-control" disabled id="categories-select">
                    <option selected disabled>Categorie</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="col-md-5">
                <select class="form-control" id="subcategories-select" disabled>
                    <option selected disabled>Subcategorie</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="justify-content-center col-md-2">
                <button class="btn btn-primary" id="filters-button">
                    Aplica filtre
                </button>
            </div>
        </div>

{{--        @foreach($orders as $order)--}}
{{--            @include('orders.order_component', ['order' => $order])--}}
{{--        @endforeach--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                {{$orders->links('vendor.pagination.bootstrap-4')}}--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection


@section('scripts')

    <script>
        const categoriesSelect = $('#categories-select');
        const subcategoriesSelect = $('#subcategories-select');
        let _token = $('meta[name="csrf-token"]').attr('content');

        function getDomain(slug) {
             let url = '{{route('domain.getCategories', ['domain' => ':tobereplaced'])}}';
             url = url.replace(':tobereplaced', slug);

             $.ajax({
                 url: url,
                 type: 'POST',
                 data: {
                     _token: _token,
                 },
                 success: function (response) {
                     categoriesSelect.removeAttr('disabled');

                     response[0].forEach(element => {
                         console.log(element);
                     });
                 }
             });
        }


        $('#filters-button').click(function (event) {
            console.log(categoriesSelect.value);

        });

    </script>

@endsection
