@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if (!is_null($users) && count($users) > 0)
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
                                        <form method="POST" action="{{route('admin.deleteUser', ['user' => $user])}}">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <input type="submit" class="btn btn-danger delete-user" value="Delete">
                                        </form>
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


@section('scripts')
    <script>
        $(document).ready(function(e) {
            $('.delete-user').on('click', function(e){
                e.preventDefault() // Don't post the form, unless confirmed
                e.stopPropagation()
                if (confirm('Esti sigur ca vrei sa stergi acest user?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
        });
    </script>
@endsection
