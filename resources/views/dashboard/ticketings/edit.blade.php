@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Ticket</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/ticketings" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    autofocus value="{{ old('name', $ticketing->name) }}">
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
                <input type="text" class="form-control @error('summary') is-invalid @enderror" id="summary"
                    name="summary" autofocus value="{{ old('summary', $ticketing->summary) }}">
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

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status">
                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <option selected>Open this select menu</option>
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
        </div> --}}



            <button type="submit" class="btn btn-primary">Create Ticket</button>
        </form>
    </div>

    <script>
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function() {
        //   fetch('/dashboard/ticketings/checkSlug?title=' + title.value)
        //   .then(response => response.json())
        //   .then(data => slug.value = data.slug)
        // });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // function previewImage(){
        //   const image = document.querySelector('#image');
        //   const imgPreview = document.querySelector('.img-preview');

        //   imgPreview.style.display = 'block';

        //   const oFReader = new FileReader();
        //   oFReader.readAsDataURL(image.files[0]);

        //   oFReader.onload = function(oFREvent){
        //     imgPreview.src = oFREvent.target.result;
        //   }
        // }
    </script>
@endsection
