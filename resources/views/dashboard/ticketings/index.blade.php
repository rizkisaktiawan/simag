@extends('dashboard.layouts2.main')
@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>IT Ticketing System</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive col-lg">
                        <a href="/dashboard/ticketings/create" class="btn btn-primary mb-3">Create New Ticket</a>
                        {{-- <table class="table table-striped" id="example"> --}}
                        <table id="datatablesit" class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($ticketings as $ticketing)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        {{-- <td scope="row"></td> --}}
                                        <td>{{ $ticketing->name }}</td>
                                        <td>{{ $ticketing->division->name }}</td>
                                        <td>{{ $ticketing->summary }}</td>
                                        <td>{{ $ticketing->priority_id }}</td>
                                        <td>{{ $ticketing->status_id }}</td>
                                        <td>{{ $ticketing->category_id }}</td>
                                        <td>
                                            {{-- <a href="{{ route('ticketi') }}"></a> --}}
                                            <a href="/dashboard/ticketings/{{ $ticketing->id }}"
                                                class="btn btn-info btn-circle btn-sm"><i class="fa-solid fa-eye"></i></a>
                                            <a href="/dashboard/ticketings/{{ $ticketing->id }}/edit"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="/dashboard/ticketings/{{ $ticketing->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-circle btn-sm"
                                                    onclick="return confirm('Are You Sure to Delete Column/Data?')"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                                {{-- <button class="btn btn-success dropdown-toggle badge border-0" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa-solid fa-screwdriver-wrench"></i>

                                            </button>

                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"
                                                        onclick="return confirm('Are You Sure?')">Open</a></li>
                                                <li><a class="dropdown-item" href="#"
                                                        onclick="return confirm('Are You Sure?')">In
                                                        Progress</a></li>
                                                <li><a class="dropdown-item" href="#"
                                                        onclick="return confirm('Are You Sure?')">Done</a></li>
                                            </ul> --}}

                                                <a href="/dashboard/ticketings/{{ $ticketing->id }}/edit"
                                                    class="btn btn-secondary btn-circle btn-sm">
                                                    <i class="fa-solid fa-circle-check"></i>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
@endsection
