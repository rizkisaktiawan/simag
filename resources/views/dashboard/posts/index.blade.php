@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h3>Post's List</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive col-lg">
                        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
                        <table class="table table-striped table-sm" id="datatablesPost">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>
                                            <a href="/dashboard/posts/{{ $post->slug }}"
                                                class="btn btn-info btn-circle btn-sm">
                                                <i class="fas fa-solid fa-eye"></i>
                                            </a>
                                            <a href="/dashboard/posts/{{ $post->slug }}/edit"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-solid fa-pencil"></i>
                                            </a>

                                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-circle btn-sm"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <i class="fas fa-solid fa-trash"></i>
                                                </button>
                                                {{-- <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are You Sure?')"><span
                                                    data-feather="trash-2"></span></button> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top">
                        <i class="fas fa-arrow-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
