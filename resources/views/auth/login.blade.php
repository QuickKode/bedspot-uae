@extends('layouts.app')

@section('title', 'Log In')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h1 class="h4 mb-4">Log in</h1>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <div class="text-end mb-3">
    <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
</div>
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label for="remember" class="form-check-label">Remember me</label>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">Log in</button>
                    </form>

                    <p class="text-center text-muted small mt-3 mb-0">
                        No account? <a href="{{ route('register') }}">Create one</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection