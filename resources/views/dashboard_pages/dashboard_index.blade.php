@extends('components/dashboard_layouts/dashlayout')

@section('dashboard_container')
    <h1 class="h3 text-center pt-3 pb-2 mb-3">{{ auth()->user()->username }}'s Posts</h1>
    <a href="/dashboard/post/create" class="btn btn-primary mb-3">
        <i class="bi bi-plus-square"></i>
        Create new blog post
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-4" role="alert">
            <i class="bi bi-check2"></i>
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($posts->count())
    <table class="table table-bordered">
            <thead class="table-info">
                <tr>
                    <th scope="col" class="fs-6 text-center">ID</th>
                    <th scope="col" class="fs-6 text-center">Title</th>
                    <th scope="col" class="fs-6 text-center">Category</th>
                    <th scope="col" class="fs-6 text-center">Action</th>
                </tr>
            </thead>
            @foreach ($posts as $post)
            <tbody>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $post->title }}</td>
                    <td class="text-center">{{ $post->category->name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/dashboard/post/{{ $post->slug }}" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-info-square-fill"></i>
                                More
                            </a>
                            <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-outline-warning btn-sm mx-2">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <form action="/dashboard/post/{{ $post->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-sm" 
                                    onclick="return confirm('Are You Sure?')">
                                    <i class="bi bi-trash3-fill"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
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
        <br>
        <br>
    @else
    <div class="alert alert-info">
        <i class="bi bi-info-circle-fill"></i>
        No Post Has Been Added Yet.
    </div>
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
    <br>
    <br>
    <br>
    @endif
@endsection