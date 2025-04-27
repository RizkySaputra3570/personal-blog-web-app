@extends('components/dashboard_layouts/dashlayout')

@section('dashboard_container')
    <div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Create Category</h2>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/category" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control
                @error('name') is-invalid @enderror" value="{{ old('name') }}"
                placeholder="Insert Category Name">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control" disabled>
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>                
            <a href="/dashboard" class="btn btn-dark">Back</a>                
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection