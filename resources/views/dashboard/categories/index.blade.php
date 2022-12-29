@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Post Categories List</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive col-lg">
                        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create New Category</a>
                        <table class="table table-striped table-sm" id="datatablesCategory">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{-- <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a> --}}
                                            <a href="/dashboard/categories/{{ $category->id }}/edit"
                                                class="btn btn-info btn-circle btn-sm">
                                                <span class="fas fa-solid fa-pencil"></span></a>
                                            <form action="/dashboard/categories/{{ $category->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-circle btn-sm"
                                                    onclick="return confirm('Are You Sure?')"><span
                                                        class="fas fa-solid fa-trash"></span></button>
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
