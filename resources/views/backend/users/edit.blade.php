@extends('home')


@section('content')
    <div class="row">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle"> Update users with role </h1>
            <a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
                Get more user information
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" placeholder="Enter name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $user->email) }}" placeholder="Enter email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- role --}}
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            @if($role->id == $userHasRoles) selected @endif>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            {{-- <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">

                                        <option value="1">Super Admin</option>
                                        <option value="2">Admin</option>
                                        <option value="3">Manager</option>
                                        <option value="4">User</option>
                                        <option value="5">Staff</option>

                                </select>
                                @error('role')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div> --}}


                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>


                </form>


            </div>


        </div>



    </div>
@endsection
