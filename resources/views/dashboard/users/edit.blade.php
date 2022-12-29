@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit User's</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="col-lg-8">
                        <form method="POST" action="/dashboard/users/{{ $user->id }}" class="mb-5"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" required autofocus
                                    value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" required autofocus
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
      <label for="password" class="form-label">Password Baru</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autofocus value="{{ old('password') }}">
    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div> --}}

                            <div class="mb-3">
                                <label for="is_admin" class="form-label">Role</label>
                                <select class="form-select @error('is_admin') is-invalid @enderror" name="is_admin"
                                    value="{{ old('is_admin', $user->is_admin) }}">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                                @error('is_admin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#ubahPassworsModal">Ubah
                                Password</button>

                            <div class="modal fade" id="ubahPassworsModal" tabindex="-1"
                                aria-labelledby="ubahPassworsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="ubahPassworsModalLabel">Update Password User
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                                        <div class="card">
                                                            <div class="card-header"></div>

                                                            <form action="" method="POST">
                                                                @csrf
                                                                <div class="card-body">
                                                                    @if (session('status'))
                                                                        <div class="alert alert-success" role="alert">
                                                                            {{ session('status') }}
                                                                        </div>
                                                                    @elseif (session('error'))
                                                                        <div class="alert alert-danger" role="alert">
                                                                            {{ session('error') }}
                                                                        </div>
                                                                    @endif

                                                                    <div class="mb-3">
                                                                        <label for="oldPasswordInput" class="form-label">Old
                                                                            Password</label>
                                                                        <input name="old_password" type="password"
                                                                            class="form-control @error('old_password') is-invalid @enderror"
                                                                            id="oldPasswordInput"
                                                                            placeholder="Old Password">
                                                                        @error('old_password')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="newPasswordInput" class="form-label">New
                                                                            Password</label>
                                                                        <input name="new_password" type="password"
                                                                            class="form-control @error('new_password') is-invalid @enderror"
                                                                            id="newPasswordInput"
                                                                            placeholder="New Password">
                                                                        @error('new_password')
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="confirmNewPasswordInput"
                                                                            class="form-label">Confirm New
                                                                            Password</label>
                                                                        <input name="new_password_confirmation"
                                                                            type="password" class="form-control"
                                                                            id="confirmNewPasswordInput"
                                                                            placeholder="Confirm New Password">
                                                                    </div>

                                                                </div>

                                                                <div class="card-footer">
                                                                    <button class="btn btn-success">Submit</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
