@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Create New Ticket'ss</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>
                        <form method="POST" action="/dashboard/ticketings" class="mb-5" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" autofocus value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="division_id" class="form-label">Division</label>
                                <select class="form-select" name="division_id">
                                    <option selected>Open this select menu</option>
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
                                <label for="summary" class="form-label">Summary</label>
                                <input type="text" class="form-control @error('summary') is-invalid @enderror"
                                    id="summary" name="summary" autofocus value="{{ old('summary') }}">
                                @error('summary')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="description"></trix-editor>
                            </div>

                            <div class="mb-3">
                                <label for="image_before" class="form-label">Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control" @error('image_before') is-invalid @enderror type="file"
                                    id="image_before" name="image_before" onchange="previewimage_before()">
                                @error('image_before')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="priority_id" class="form-label">Priority</label>
                                <select class="form-select" name="priority_id">
                                    @error('priority_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option selected>Open this select menu</option>
                                    <option value="Urgent">Urgent</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status_id" class="form-label">Status</label>
                                <select class="form-select" name="status_id">
                                    @error('status_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option selected>Open this select menu</option>
                                    <option value="Open">Open</option>
                                    <option value="Closed">Closed</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option selected>Open this select menu</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="Software">Software</option>
                                    <option value="Network">Network</option>
                                </select>
                            </div>

                            {{-- <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" name="category_id">
            @foreach ($categories as $category)
            @if (old('category_id') == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
              @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
            @endforeach
            
          </select>        
        </div> --}}

                            {{-- <div class="mb-3">
          <label for="image" class="form-label">Post Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5"> 
          <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div> --}}



                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
