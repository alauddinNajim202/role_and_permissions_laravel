@extends('home')

@section('content')
    <div class="row">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Article </h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more articles
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $article->title) }}" placeholder="Enter title">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    rows="10" id="description" name="description" placeholder="Enter description">{{ old('description', $article->content) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" name="author" id="author"
                                    class="form-control @error('author') is-invalid @enderror"
                                    value="{{ old('author', $article->author) }}" placeholder="Enter author">
                                @error('author')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" placeholder="Choose image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger btn-block">Update article</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
