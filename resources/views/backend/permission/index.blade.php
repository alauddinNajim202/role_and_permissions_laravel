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
                <!-- pagination -->
                @if ($permissions->lastPage() > 1)
                    <div class="d-flex justify-content-center">
                        <div class="pagination">
                            @if ($permissions->currentPage() > 1)
                                <a class="page-link" href="{{ $permissions->url($permissions->currentPage() - 1) }}">Previous</a>
                            @endif

                            @for ($page = 1; $page <= $permissions->lastPage(); $page++)
                                @if ($page == $permissions->currentPage())
                                    <span class="page-link active">{{ $page }}</span>
                                @else
                                    <a class="page-link" href="{{ $permissions->url($page) }}">{{ $page }}</a>
                                @endif
                            @endfor

                            @if ($permissions->currentPage() < $permissions->lastPage())
                                <a class="page-link" href="{{ $permissions->url($permissions->currentPage() + 1) }}">Next</
                                    </a>
                            @endif
                            <!-- show total pages -->
                            Total: {{ $permissions->lastPage() }}
                        </div>
                        <!-- show current page -->
                        Current page: {{ $permissions->currentPage() }}
                    </div>
                    <!-- end pagination -->
                                    @endif
















            </div>



        </div>
    @endsection
