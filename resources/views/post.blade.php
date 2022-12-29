@extends('layouts.main')

@section('container')

<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="mb-5">{{ $post->title }}</h1>
      {{-- <a href="/posts" --}}
      {{-- <h2 class="mb-3">{{ $post->title }}</h2>
      <p>{{ $post->body }}</p> --}}
      <p>By. <a href="/posts?authors={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
      @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
        @else
        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
      @endif
      <article class="my-3" >
        {{-- {{ $post->body }} --}}
        {!! $post->body !!}
      </article>
      <a href="/posts" class="text-decoration-none btn btn-primary">Back to Posts</a>
    </div>
  </div>
</div>

@endsection