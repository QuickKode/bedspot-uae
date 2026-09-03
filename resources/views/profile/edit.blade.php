@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">

            <h1 class="h3 mb-4">My Profile</h1>

            {{-- Details --}}
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">Account details</h2>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label for="name" class="form-label">Full name</label>
                            <input type="text" name="name" id="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   class="form-control @error('email') is-invalid @enderror" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone"
                                   value="{{ old('phone', auth()->user()->phone) }}"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   placeholder="05X XXX XXXX">
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Account type</label>
                            <input type="text" class="form-control" disabled
                                   value="{{ auth()->user()->role->label() }}">
                            <div class="form-text">Contact support to change your account type.</div>
                        </div>

                        <button class="btn btn-dark">Save changes</button>
                    </form>
                </div>
            </div>

            {{-- Password --}}
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h2 class="h5 mb-3">Change password</h2>

                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current password</label>
                            <input type="password" name="current_password" id="current_password"
                                   autocomplete="current-password"
                                   class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="new_password" class="form-label">New password</label>
                            <input type="password" name="password" id="new_password"
                                   autocomplete="new-password"
                                   class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm new password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   autocomplete="new-password"
                                   class="form-control" required>
                        </div>

                        <button class="btn btn-dark">Update password</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection