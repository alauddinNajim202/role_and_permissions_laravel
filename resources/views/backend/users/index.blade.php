@extends('home')


@section('content')
    <div class="row">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">User with role lists</h1>


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
                            <th>Role</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td> {{$user->roles->pluck('name')->implode(' ')}} </td>

                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('users.edit', $user->id) }}"><i
                                            class="fas fa-edit">Edit</i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
                <!-- pagination -->
                @if ($users->lastPage() > 1)
                    <div class="d-flex justify-content-center">
                        <div class="pagination">
                            @if ($users->currentPage() > 1)
                                <a class="page-link"
                                    href="{{ $users->url($users->currentPage() - 1) }}">Previous</a>
                            @endif

                            @for ($page = 1; $page <= $users->lastPage(); $page++)
                                @if ($page == $users->currentPage())
                                    <span class="page-link active">{{ $page }}</span>
                                @else
                                    <a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a>
                                @endif
                            @endfor

                            @if ($users->currentPage() < $users->lastPage())
                                <a class="page-link" href="{{ $users->url($users->currentPage() + 1) }}">Next</
                                        </a>
                            @endif
                            <!-- show total pages -->
                            Total: {{ $users->lastPage() }}
                        </div>
                        <!-- show current page -->
                        Current page: {{ $users->currentPage() }}
                    </div>
                    <!-- end pagination -->
                @endif
















            </div>



        </div>
    @endsection
