@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (!is_null($users) && count($users) > 0)
                <div class="col col-md-10 bg-white rounded mx-auto p-0">
                    <table class="w-100 table table-striped m-0 p-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nume</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actiuni</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            @empty
                                <p>No user found!</p>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="w-100">
                        {{ $users->links('vendor.pagination.table-pagination') }}
                    </div>

                </div>
            @else
                <div class="col col-md-10 alert-warning  rounded mx-auto">
                    Nu Avem Useri
                </div>

            @endif

        </div>
    </div>
@endsection
