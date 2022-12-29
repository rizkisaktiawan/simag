@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Create New Employee's</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="col-lg-12">
                        <form method="POST" action="/dashboard/employees" class="mb-5" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip"
                                    name="nip" autofocus value="{{ old('nip') }}">
                                @error('nip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_birth" class="form-label">Date of Birth</label>
                                <input id="date_birth" class="form-control" type="date" name="date_birth" />
                                <span id="date_birthSelected" hidden></span>
                                @error('date_birth')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="address" type="hidden" name="address" value="{{ old('address') }}">
                                <trix-editor input="address"></trix-editor>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" aria-label="Default select example" name="gender">
                                    <option selected>Open this select menu</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="marital_status" class="form-label">Marital Status</label>
                                <select class="form-select" aria-label="Default select example" name="marital_status">
                                    <option selected>Open this select menu</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="single">Single</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="religion" class="form-label">Religion</label>
                                <select class="form-select" name="religion">
                                    <option selected>Open this select menu</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                    <option value="konghucu">Konghucu</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="no_ktp" class="form-label">No KTP</label>
                                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror"
                                    id="no_ktp" name="no_ktp" value="{{ old('no_ktp') }}">
                                @error('no_ktp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email"
                                    class="form-control @error('email')is-invalid @enderror" id="email"
                                    placeholder="name@example.com" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_join" class="form-label">Date Join</label>
                                <input id="date_join" class="form-control" type="date" name="date_join" />
                                <span id="date_joinSelected" hidden></span>
                                @error('date_join')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="division_id" class="form-label">Division</label>
                                <select class="form-select" name="division_id">
                                    @foreach ($divisions as $division)
                                        @if (old('division_id') == $division->id)
                                            <option value="{{ $division->id }}" selected>{{ $division->name }}</option>
                                        @else
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control @error('position') is-invalid @enderror"
                                    id="position" name="position" value="{{ old('position') }}">
                                @error('position')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" name="status_id">
                                    @foreach ($statuses as $status)
                                        @if (old('status_id') == $status->id)
                                            <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                        @else
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
