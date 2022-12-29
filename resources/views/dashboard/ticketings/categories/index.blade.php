@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Categorie's List</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive col-lg-12">
                        <a href="/dashboard/ticketings/categories/create" class="btn btn-primary mb-3">Create Ticket
                            Categories</a>
                        <table class="table table-striped" id="datatablesITCategory">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ticket Category Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($TicketingCategories as $TicketingCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $TicketingCategory->name }}</td>
                                        <td>{{ $TicketingCategory->slug }}</td>
                                        <td>
                                            {{-- <a href="/dashboard/categorys/{{ $category->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a> --}}
                                            <a href="/dashboard/ticketings/categories/{{ $TicketingCategory->id }}/edit"
                                                class="btn btn-warning btn-circle btn-sm">
                                                <span class="fa-solid fa-pencil"></span></a>
                                            <form action="/dashboard/ticketings/categories/{{ $TicketingCategory->id }}"
                                                method="POST" class="d-inline">
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
