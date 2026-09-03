@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h1 class="h4 mb-4">Set a new password</h1>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $email) }}"
                                   class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New password</label>
                            <input type="password" name="password" id="password" autocomplete="new-password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm new password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   autocomplete="new-password" class="form-control" required>
                        </div>

                        <button class="btn btn-dark w-100 py-2">Reset password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection