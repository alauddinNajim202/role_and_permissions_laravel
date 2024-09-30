@extends('home')


@section('content')

<div class="row">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Permission lists</h1>

            </div>
            <div class="row">
                {{-- table --}}
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('permissions.destroy', $permission->id) }}" onclick="return confirm('Are you sure you want to delete this permission?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <a href="{{ route('permissions.create') }}"><i class="fas fa-plus-circle"></i> Add new permission</a>
                                </td>
                            </tr>
                        </tfoot>

                    </table>















            </div>



</div>



@endsection
