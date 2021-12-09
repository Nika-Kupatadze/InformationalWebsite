@extends('layouts.app')

@section('title', 'Post')


@section('content')
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="{{ URL('images/pen.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>

            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
@endsection