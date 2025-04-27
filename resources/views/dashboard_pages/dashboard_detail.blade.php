@extends('components/dashboard_layouts/dashlayout')

@section('dashboard_container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $post->title }}</h1>
                <a href="/dashboard" class="btn btn-dark">
                    Back
                </a>
                @if ($post->post_image)
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset("/storage/$post->post_image") }}" alt="{{ $post->title }}" class="img-fluid mt-3">
                </div>
                @else
                <div style="max-height: 350px; overflow: hidden;">
                    <img src="{{ asset('/storage/images/no_image.png') }}" alt="No Image Available" class="img-fluid mt-3">
                </div>
                @endif
                <article class="my-3 fs-5">{!! $post->body !!}</article>
            </div>
        </div>
    </div>
    <br>

@endsection