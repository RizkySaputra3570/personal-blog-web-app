@extends('components/main_layouts/mainlayout')

@section('main_container')
                    <h3 class="text-center mt-3 mb-5">{{ $title }}</h3>
                    <main class="container">
                        <div class="row">
                            @if ($posts->count())
                                <form action="/posts">
                                    @if (request('category'))
                                        <input type="hidden" name="category" value="{{ request('category') }}">
                                    @endif
                                    @if (request('author'))
                                        <input type="hidden" name="author" value="{{ request('author') }}">
                                    @endif
                                    <div class="input-group rounded mb-5 col-sm-6">
                                        <input type="search" name="search" class="form-control" 
                                        placeholder="Search..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-outline-info">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                                @foreach ($posts as $post)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        @if ($post->post_image)
                                        <img src="{{ asset("/$post->post_image") }}" alt="{{ $post->category->name }}" class=" card-img-top img-fluid">
                                        @else
                                        <img src="{{ asset('/storage/images/no_image.png') }}" alt="No Image Available" class="card-img-top">
                                        @endif       
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            <p class="card-text">{!! $post->excerpt !!}</p>
                                            <small class="text-muted">
                                                By: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none text-dark">
                                                    {{ $post->author->name }}
                                                </a>
                                                {{ $post->created_at->diffForHumans() }}
                                            </small>
                                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary d-block">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="h5 text-center mt-5">No Post Available</p>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            @endif
                            <div class="d-flex justify-content-center mb-3">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </main>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
@endsection