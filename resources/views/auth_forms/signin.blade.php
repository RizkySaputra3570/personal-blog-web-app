@extends('components/auth_form_layout')

@section('auth_container')
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissable fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>                                    
                        @endif
                        <main class="card" style="width: 24rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $title }}</h5>
                                <section class="col-lg-8">
                                    <form action="/signin" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" id="username" 
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Username" value="{{ old('username') }}">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror                                                                                        
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" id="password" 
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Maximum 20 characters">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror                                                                                                                                    
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                            <a href="/posts" class="btn btn-dark">Back</a>
                                        </div>
                                        <div class="mt-4">
                                            <small class="text-center">
                                                Don't have any account? Click 
                                                <a href="/signup" class="text-decoration-none text-dark">here</a>
                                            </small>
                                        </div>                                        
                                    </form>
                                </section>
                            </div>
                        </main>
@endsection