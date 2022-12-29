@extends('dashboard.layouts2.main')

@section('container')
    <div id="wrapper">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left-circle"></span> To all
                        My
                        Posts</a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span
                            data-feather="edit"></span>
                        Edit</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger " onclick="return confirm('Are You Sure?')"><span
                                data-feather="trash-2"></span> Delete</button>
                    </form>

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid mt-3">
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    @endif

                    <article class="my-3 fs-5">
                        {{-- {{ $post->body }} --}}
                        {!! $post->body !!}
                    </article>
                    {{-- <a href="/posts" class="text-decoration-none btn btn-primary">Back to Posts</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
