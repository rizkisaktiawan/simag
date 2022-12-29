@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Statuses List</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive col-lg-12">
                        <a href="/dashboard/statuses/create" class="btn btn-primary mb-3">Create New Status</a>
                        <table class="table table-striped" id="datatablesStatus">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $status)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $status->name }}</td>
                                        <td>
                                            {{-- <a href="/dashboard/statuses/{{ $status->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a> --}}
                                            <a href="/dashboard/statuses/{{ $status->id }}/edit"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <span class="fa-solid fa-pencil"></span></a>
                                            <form action="/dashboard/statuses/{{ $status->id }}" method="POST"
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
