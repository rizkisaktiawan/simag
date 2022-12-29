@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Employee's List</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive col-lg">
                        <a href="/dashboard/employees/create" class="btn btn-primary mb-3">Create New Employee</a>
                        <table class="table table-striped" id="datatablesEmployee">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    {{-- <th scope="col">Date Join</th> --}}
                                    <th scope="col">Division</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->nip }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->email }}</td>
                                        {{-- <td>{{ $employee->date_join }}</td> --}}
                                        <td>{{ $employee->division->name }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->status?->name }}</td>
                                        <td>

                                            {{-- <a href="/dashboard/employees/{{ $employee->id }}"
                                                class="btn btn-info btn-circle btn-sm"><i class="fa-solid fa-eye"></i></a> --}}

                                            {{-- <a class="btn btn-success btn-circle btn-sm" data-toggle="modal"
                                                data-target="#applicantModal{{ $employee->id }}"><i
                                                    class="fa-solid fa-eye"></i></a></i></a> --}}

                                            <div class="modal fade" id="applicantModal{{ $employee->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="applicantModal" aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title fs-5" id="reportKaryawanAgronesia">
                                                                Detail {!! $employee->name !!}
                                                            </h3>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">X</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form class="form-floating">
                                                                <input type="email" class="form-control"
                                                                    id="floatingInputValue" placeholder="name@example.com"
                                                                    value="test@example.com">
                                                                <label for="floatingInputValue">Input with value</label>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    </div>
                    {{-- @foreach ($employees as $employee)
                                                @include('dashboard.employees.show');
                                                <a class="btn btn-primary" data-toggle="modal" data-
                                                    target="#applicantModal{{ $employee->id }}"><i class="fa-solid fa-eye"></i></a>
                                            @endforeach --}}

                    <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-warning btn-circle btn-sm"> <i
                            class="fa-solid fa-pen-to-square"></i></a>

                    <form action="/dashboard/employees/{{ $employee->id }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are You Sure?')"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </form>
                    </td>
                    </tr>
                @empty
                    <div class="alert alert-danger" role="alert">
                        Data Kosong
                    </div>
                    @endforelse
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
