@extends('home')


@section('content')
    <div class="row">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Permission lists</h1>

            <div style="float: right">
                <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fas fa-plus-circle"></i> Add new
                    permission</a>
            </div>
        </div>


        @if (session('success'))
            <div class="alert text-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="row">
            {{-- table --}}
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>

                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-edit">Edit</i></a>
                                        <a href="{{ route('permissions.destroy', $permission->id) }}" onclick="return confirm('Are you sure you want to delete this permission?')"><i class="fas fa-trash"></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>


                </table>















            </div>



        </div>
    @endsection
