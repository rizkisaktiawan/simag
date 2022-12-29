@extends('dashboard.layouts2.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col">

                <a href="/dashboard/ticketings" class="btn btn-success"><span data-feather="arrow-left-circle"></span> To all
                    My Ticket</a>
                <a href="/dashboard/ticketings/{{ $ticketing->id }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/ticketings/{{ $ticketing->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger " onclick="return confirm('Are You Sure?')"><span
                            data-feather="trash-2"></span> Delete</button>
                </form><br><br>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="card text-bg-secondary mb-6" style="max-width: 720px;">
                            <div class="card-body">
                                <h5 class="card-title">Before :</h5>
                                @if ($ticketing->image_before)
                                    <img src="{{ asset('storage/' . $ticketing->image_before) }}"
                                        alt="{{ $ticketing->summary }}" class="img-fluid mt-3">
                                @else
                                    <img src="https://source.unsplash.com/1200x400?{{ $ticketing->summary }}"
                                        alt="{{ $ticketing->summary }}" class="img-fluid mt-3">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-bg-success mb-6" style="max-width: 720px;">
                            <div class="card-body">
                                <h5 class="card-title">After :</h5>
                                @if ($ticketing->image_after)
                                    <img src="{{ asset('storage/' . $ticketing->image_after) }}"
                                        alt="{{ $ticketing->summary }}" class="img-fluid mt-3">
                                @else
                                    <img src="https://source.unsplash.com/1920x1080?{{ $ticketing->summary }}"
                                        alt="{{ $ticketing->summary }}" class="img-fluid mt-3">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <article class="my-3 fs-5">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm diwsplay nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Division</th>
                                    <th scope="col">Summary</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $ticketing->name }}</td>
                                    <td>{{ $ticketing->division->name }}</td>
                                    <td>{{ $ticketing->summary }}</td>
                                    <td>{{ $ticketing->priority }}</td>
                                    <td>{{ $ticketing->status }}</td>
                                    <td>{{ $ticketing->category }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    Description : {!! $ticketing->description !!}
                </article>
                {{-- <a href="/posts" class="text-decoration-none btn btn-primary">Back to Posts</a> --}}
            </div>
        </div>
    </div>
@endsection
