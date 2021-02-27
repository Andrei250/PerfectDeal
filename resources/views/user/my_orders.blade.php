@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-10 bg-white rounded mx-auto p-0">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if(count($orders) > 0)

                    <table class="w-100 table table-striped m-0 p-0">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titlu</th>
                            <th scope="col">Actiuni</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $order->title }}</td>
                                <td>
                                    <button class="btn btn-primary float-left">
                                        Modifica
                                    </button>
                                    <form class="float-left ml-2" method="POST" action="{{route('company.deleteOrder', ['order' => $order])}}">
                                        @csrf
                                        {{ method_field('DELETE') }}

                                        <input type="submit" class="btn btn-danger delete-order" value="Sterge">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="w-100">
                        {{ $orders->links('vendor.pagination.table-pagination') }}
                    </div>
                @else
                    <p class="alert alert-warning m-0 w-100">
                        Nu aveti nicio comanda in sistem.
                    </p>
                @endif
            </div>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete-order').on('click', function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            e.stopPropagation()
            if (confirm('Esti sigur ca vrei sa stergi aceasta comanda?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
@endsection
