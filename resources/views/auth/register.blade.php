@extends('layouts.app')

@section('title', 'Create an Account')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h1 class="h4 mb-1">Create your account</h1>
                    <p class="text-muted small mb-4">Find a bedspace, or list one.</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">I want to</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="role" id="role_seeker" value="seeker"
                                        {{ old('role', 'seeker') === 'seeker' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-dark w-100" for="role_seeker">Find a bedspace</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="role" id="role_owner" value="owner"
                                        {{ old('role') === 'owner' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-dark w-100" for="role_owner">List a bedspace</label>
                                </div>
                            </div>
                            @error('role')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Full name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                Phone <span class="text-muted fw-normal">(optional)</span>
                            </label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                   class="form-control @error('phone') is-invalid @enderror" placeholder="05X XXX XXXX">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label">Confirm password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 py-2">Create account</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection