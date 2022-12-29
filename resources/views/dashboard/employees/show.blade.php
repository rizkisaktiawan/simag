@extends('dashboard.layouts2.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                {{-- <h1 class="mb-3">{{ $employee->title }}</h1> --}}

                <a href="/dashboard/employees" class="btn btn-success"><span data-feather="arrow-left-circle"></span> To all My
                    employees</a>
                <a href="/dashboard/employees/{{ $employee->id }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/employees/{{ $employee->id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger " onclick="return confirm('Are You Sure?')"><span
                            data-feather="trash-2"></span> Delete</button>
                </form>

                {{-- @if ($employee->image)
                    <img src="{{ asset('storage/' . $employee->image) }}" alt="{{ $employee->category }}"
                        class="img-fluid mt-3">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $employee->category }}"
                        alt="{{ $employee->category }}" class="img-fluid mt-3">
                @endif --}}

                <article class="my-3 fs-5">
                    {{-- {{ $employee->body }} --}}
                    {!! $employee->name !!}
                </article>
                {{-- <a href="/employees" class="text-decoration-none btn btn-primary">Back to employees</a> --}}
            </div>
        </div>
    </div>
@endsection
