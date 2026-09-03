@extends('layouts.app')
@section('title', 'Forgot Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="h4 mb-2">Forgot your password?</h1>
                    <p class="text-muted small mb-4">
                        Enter your email and we'll send you a reset link.
                    </p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required autofocus>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <button class="btn btn-dark w-100 py-2">Send reset link</button>
                    </form>

                    <p class="text-center small mt-3 mb-0">
                        <a href="{{ route('login') }}">Back to login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection