@extends('components.main_layouts.mainlayout')

@section('main_container')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3 mt-3">{{ $post->title }}</h1> 
                <p>
                    By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-dark">
                        {{ $post->author->name }}
                    </a>
                    in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-dark">
                        {{ $post->category->name }}
                    </a>
                </p>  
                @if ($post->post_image)
                <div style="max-height: 250px; overflow: hidden;">
                    <img src="{{ asset("/storage/$post->post_image") }}" alt="{{ $post->title }}" class="img-fluid mt-3">
                </div>
                @else
                <img src="{{ asset('/storage/images/no_image.png') }}" alt="No Image Available" class="img-fluid">
                @endif
                <article class="my-3 fs-5">{!! $post->body !!}</article>
                <a href="/posts" class="text-decoration-none">Back</a>             
            </div>
        </div>
    </div>
    <br>
@endsection