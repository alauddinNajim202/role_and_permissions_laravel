@extends('home')


@section('content')
    <div class="row">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Article lists</h1>

            <div style="float: right">
                <a class="btn btn-primary" href="{{ route('articles.create') }}"><i class="fas fa-plus-circle"></i> Add new
                    article</a>
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
                            <th>Description</th>
                            <th>Image</th>
                            <th>Author</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td width="40%" >{{ $item->content }}</td>
                                <td>
                                    <img src="{{ asset('/'). $item->image }}" alt="{{ $item->title }}" width="200px" height="100">

                                </td>
                                <td class="text-danger">{{ $item->author }}</td>

                                <td>
                                    <a href="{{ route('articles.edit', $item->id) }}"><i
                                            class="fas fa-edit">Edit</i></a>
                                    <a href="{{ route('articles.destroy', $item->id) }}"
                                        onclick="return confirm('Are you sure you want to delete this permission?')"><i
                                            class="fas fa-trash"></i>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
                <!-- pagination -->
                @if ($articles->lastPage() > 1)
                    <div class="d-flex justify-content-center">
                        <div class="pagination">
                            @if ($articles->currentPage() > 1)
                                <a class="page-link"
                                    href="{{ $articles->url($articles->currentPage() - 1) }}">Previous</a>
                            @endif

                            @for ($page = 1; $page <= $articles->lastPage(); $page++)
                                @if ($page == $articles->currentPage())
                                    <span class="page-link active">{{ $page }}</span>
                                @else
                                    <a class="page-link" href="{{ $articles->url($page) }}">{{ $page }}</a>
                                @endif
                            @endfor

                            @if ($articles->currentPage() < $articles->lastPage())
                                <a class="page-link" href="{{ $articles->url($articles->currentPage() + 1) }}">Next</
                                        </a>
                            @endif
                            <!-- show total pages -->
                            Total: {{ $articles->lastPage() }}
                        </div>
                        <!-- show current page -->
                        Current page: {{ $articles->currentPage() }}
                    </div>
                    <!-- end pagination -->
                @endif
















            </div>



        </div>
    @endsection
