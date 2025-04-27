@extends('components/dashboard_layouts/dashlayout')

@section('dashboard_container')
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit Post</h2>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/post/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control
                @error('title') is-invalid @enderror" value="{{ old('title', $post->title) }}"
                placeholder="Insert Title">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    <option>Select Category</option>
                    <hr class="dropdown-divider">
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)  
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>            
            <div class="mb-3">
                <label for="post_image" class="form-label">Image</label>
                <input type="hidden" name="oldImage" value="{{ $post->post_image }}">
                @if ($post->post_image)
                <img src="{{ asset("/$post->post_image") }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input type="file" name="post_image" id="post_image" class="form-control
                @error('post_image') is-invalid @enderror" onchange="previewImage()">
                @error('post-image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>            
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Content</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="hidden" name="body" id="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>                      
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>                
            <a href="/dashboard" class="btn btn-dark">Back</a>                
        </form>
    </div>
@endsection