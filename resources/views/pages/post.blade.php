@extends('layouts.app')

@section('title', 'Post')


@section('content')
    <div class="container" style="margin-top: 5%">
       <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/' . $post->image_path) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->post }}</p>
            </div>

            <div class="card-body">
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit post</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to delete this post?')">Delete post</button>
                </form>
            </div>
        </div>
       </div>
    </div>
@endsection
