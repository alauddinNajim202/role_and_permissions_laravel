@extends('home')


@section('content')
    <div class="row">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Permission </h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more permission
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <form action="{{ route('permissions.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Name</h5>
                        </div>
                        <div class="card-body">
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Create Permission</button>
                        </div>
                    </div>


                </form>


            </div>


        </div>



    </div>
@endsection
