@extends('components/auth_form_layout')

@section('auth_container')
                        <main class="card" style="width: 24rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $title }}</h5>
                                <section class="col-lg-8">
                                    <form action="/signup" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name" id="name" 
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Name" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
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
                                            <label for="email" class="form-label">E-Mail</label>
                                            <input type="email" name="email" id="email" 
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="E-Mail" value="{{ old('email') }}">
                                            @error('email')  
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
                                            <button type="submit" class="btn btn-primary">Sign Me Up</button>
                                            <a href="/posts" class="btn btn-dark">Back</a>
                                        </div>
                                        <div class="mt-4">
                                            <small class="text-center">
                                                Have an account? Click 
                                                <a href="/signin" class="text-decoration-none text-dark">here</a>
                                            </small>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </main>
@endsection