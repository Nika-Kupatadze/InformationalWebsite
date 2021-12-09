@extends('layouts.app')

@section('title', 'MRGSOFT Blog')



@section('content')
    <section class="bg-dark text-light p-5 text-center text-sm-start mt-5">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">

                <div class="container-sm">
                    <h1>Some information about <span class="text-warning">MRGSOFT</span></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ab ad, eligendi eveniet iure minima quisquam reiciendis sint voluptas voluptatibus!
                        Commodi expedita ipsa labore sapiente sequi.
                        Explicabo hic quia quos unde.
                    </p>
                    <button class="btn btn-primary btn-lg">Learn more</button>
                </div>


                <div class="container-sm">
                    <h1>The type of <span class="text-danger">POSTS</span></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Ab ad, eligendi eveniet iure minima quisquam reiciendis sint voluptas voluptatibus!
                        Commodi expedita ipsa labore sapiente sequi.
                        Explicabo hic quia quos unde.
                    </p>
                    <button class="btn btn-secondary btn-lg">View all posts</button>
                </div>

            </div>
        </div>
    </section>


    <section class="p-5" id="about">
        <div class="container">
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create a post</a>

            @if($msg = session('success'))
                {{ $msg }}
            @endif

            <div class="row text-center">
                @foreach($posts as $post)
                <div class="col d-flex align-items-stretch">
                    <div class="card card-body flex-fill" style="width: 18rem;">
                        <img src="{{ URL('images/pen.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-truncate">{{ $post->post }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links() }}
            </div>
        </div>
    </section>



    <section class="p-5" id="contact">
        <div class="container">

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection


