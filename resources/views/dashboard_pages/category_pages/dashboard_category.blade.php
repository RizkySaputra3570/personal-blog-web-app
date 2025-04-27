@extends('components/dashboard_layouts/dashlayout')

@section('dashboard_container')
    <h1 class="h3 text-center pt-3 pb-2 mb-3">All Categories</h1>
    <a href="/dashboard/category/create" class="btn btn-primary mb-3">
        <i class="bi bi-plus-square"></i>
        Create new category
    </a>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-4" role="alert">
            <i class="bi bi-check2"></i>
            {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($categories->count())
    <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th scope="col" class="fs-6 text-center">ID</th>
                    <th scope="col" class="fs-6 text-center">Category</th>
                    <th scope="col" class="fs-6 text-center">Action</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
            <tbody>
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $category->name }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="/dashboard/category/{{ $category->id }}/edit" class="btn btn-outline-warning btn-sm mx-2">
                                <i class="bi bi-pencil-square"></i>
                                Edit
                            </a>
                            <form action="/dashboard/category/{{ $category->id }}" method="post" class="d-inline">
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
        No Category Has Been Added Yet.
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