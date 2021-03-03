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
                </select>
            </div>

            <div class="col-md-5">
                <select class="form-control" id="subcategories-select" disabled>
                    <option selected disabled>Subcategorie</option>
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
    <script src="{{ asset('js/newsfeed.js') }}"></script>

    <script>
        const categoriesSelect = $('#categories-select');
        const subcategoriesSelect = $('#subcategories-select');
        const _token = $('meta[name="csrf-token"]').attr('content');
        let domain;

        function getDomain(slug) {
            let url = '{{route('domain.getCategories', ['domain' => ':tobereplaced'])}}';
            url = url.replace(':tobereplaced', slug);
            domain = slug;
            disableField(categoriesSelect, "Categorie");
            disableField(subcategoriesSelect, "Subcategorie");

            makeRequest(url, _token, categoriesSelect, "Categorie");
        }

        categoriesSelect.on('change', function (event) {
            let slug = categoriesSelect.find(":selected").attr('name');
            let url = '{{route('category.getSubcategories', ['category' => ':tobereplaced'])}}';
            url = url.replace(':tobereplaced', slug);

            makeRequest(url, _token, subcategoriesSelect, "Subcategorie");
        });


        $('#filters-button').click(function (event) {
            let categorySlug = categoriesSelect.find(":selected").attr('name');
            let subcategorySlug = subcategoriesSelect.find(":selected").attr('name');


        });

    </script>

@endsection
