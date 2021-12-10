@extends('layouts.app')

@section('title', 'Editing post')

@section('content')
    <div class="container" style="margin-top: 5%">
        <form action="{{ route('posts.update', $post->id) }}" method="post" class="m-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h1>Edit post</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image</label>
                <br>
                <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                <input type="file" class="form-control" id="imageInput" name="image">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter a Title" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="post">{{ $post->post }}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Update post</button>

        </form>
    </div>
@endsection
