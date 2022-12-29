@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit Ticket's</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div>

                        <div>
                            <form method="POST" action="/dashboard/ticketings" class="mb-5" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" autofocus value="{{ old('name', $ticketing->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="division" class="form-label">Division</label>
                                    <select class="form-select" name="division_id">
                                        @foreach ($divisions as $division)
                                            @if (old('division_id', $ticketing->division) == $division->id)
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
                                        id="summary" name="summary" autofocus
                                        value="{{ old('summary', $ticketing->summary) }}">
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
                                    <input id="description" type="hidden" name="description"
                                        value="{{ old('description', $ticketing->description) }}">
                                    <trix-editor input="description"></trix-editor>
                                </div>

                                <div class="container">
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Image Before
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="oldImage"
                                                            value="{{ $ticketing->image_before }}">
                                                        @if ($ticketing->image_before)
                                                            <img src="{{ asset('storage/' . $ticketing->image_before) }}"
                                                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                        @else
                                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                                        @endif

                                                        <input class="form-control"
                                                            @error('image_before') is-invalid @enderror type="file"
                                                            id="image_before" name="image_before" onchange="previewImage()">
                                                        @error('image_before')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    Image After
                                                </div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="newImage"
                                                            value="{{ $ticketing->image_after }}">

                                                        @if ($ticketing->image_after)
                                                            <img src="{{ asset('storage/' . $ticketing->image_after) }}"
                                                                alt="{{ $ticketing->summary }}"
                                                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                        @else
                                                            <img src="https://source.unsplash.com/1920x1080?{{ $ticketing->summary }}"
                                                                alt="{{ $ticketing->summary }}"
                                                                class="img-preview img-fluid mb-3 col-sm-5">
                                                        @endif

                                                        <input class="form-control"
                                                            @error('image_after') is-invalid @enderror type="file"
                                                            id="image_after" name="image_after" onchange="previewImage()">
                                                        @error('image_after')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="division" class="form-label">Division</label>
                                    <select class="form-select" name="division_id">
                                        @foreach ($divisions as $division)
                                            @if (old('division_id', $ticketing->division) == $division->id)
                                                <option value="{{ $division->id }}" selected>{{ $division->name }}
                                                </option>
                                            @else
                                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="priority" class="form-label">Priority</label>
                                    <select class="form-select" name="priority">
                                        @if (old('priority', $ticketing->priority) == $ticketing->priority)
                                            <option value="{{ $ticketing->priority }}" selected>
                                                {{ $ticketing->priority }}
                                            </option>
                                        @else
                                            <option value="{{ $ticketing->priority }}">{{ $ticketing->priority }}
                                            </option>
                                        @endif

                                        @error('priority')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        {{-- <option selected>Open this select menu</option> --}}
                                        <option value="Urgent">Urgent</option>
                                        <option value="High">High</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select" name="category">
                                        @error('category')
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
        </div> --}}\
                                <button type="submit" class="btn btn-primary">Create Ticket</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
