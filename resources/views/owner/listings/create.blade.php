@extends('layouts.app')

@section('title', 'Add a Listing')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h1 class="h3 mb-4">Add a listing</h1>

            <form method="POST" action="{{ route('owner.listings.store') }}">
                @csrf

                {{-- Basics --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h6 text-uppercase text-muted mb-3">The basics</h2>

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                   class="form-control @error('title') is-invalid @enderror"
                                   placeholder="Bedspace in Al Nahda near metro" required>
                            @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="4"
                                      class="form-control @error('description') is-invalid @enderror"
                                      required>{{ old('description') }}</textarea>
                            @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="room_type" class="form-label">Room type</label>
                                <select name="room_type" id="room_type"
                                        class="form-select @error('room_type') is-invalid @enderror" required>
                                    <option value="">Choose…</option>
                                    @foreach (App\Enums\RoomType::cases() as $type)
                                        <option value="{{ $type->value }}" @selected(old('room_type') === $type->value)>
                                            {{ $type->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('room_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="gender_preference" class="form-label">Suitable for</label>
                                <select name="gender_preference" id="gender_preference"
                                        class="form-select @error('gender_preference') is-invalid @enderror" required>
                                    @foreach (App\Enums\GenderPreference::cases() as $pref)
                                        <option value="{{ $pref->value }}" @selected(old('gender_preference', 'any') === $pref->value)>
                                            {{ $pref->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gender_preference')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Location --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h6 text-uppercase text-muted mb-3">Location</h2>

                        <div class="row g-3">
                            <div class="col-md-5">
                                <label for="emirate" class="form-label">Emirate</label>
                                <select name="emirate" id="emirate"
                                        class="form-select @error('emirate') is-invalid @enderror" required>
                                    <option value="">Choose…</option>
                                    @foreach (['Dubai','Sharjah','Abu Dhabi','Ajman','Ras Al Khaimah','Fujairah','Umm Al Quwain'] as $em)
                                        <option value="{{ $em }}" @selected(old('emirate') === $em)>{{ $em }}</option>
                                    @endforeach
                                </select>
                                @error('emirate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-7">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" name="area" id="area" value="{{ old('area') }}"
                                       class="form-control @error('area') is-invalid @enderror"
                                       placeholder="Bur Dubai" required>
                                @error('area')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">
                                    Building / street <span class="text-muted fw-normal">(optional)</span>
                                </label>
                                <input type="text" name="address" id="address" value="{{ old('address') }}"
                                       class="form-control @error('address') is-invalid @enderror">
                                @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Price & capacity --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h6 text-uppercase text-muted mb-3">Price &amp; capacity</h2>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="monthly_rent" class="form-label">Monthly rent (AED)</label>
                                <input type="number" name="monthly_rent" id="monthly_rent" value="{{ old('monthly_rent') }}"
                                       class="form-control @error('monthly_rent') is-invalid @enderror" min="300" required>
                                @error('monthly_rent')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="security_deposit" class="form-label">
                                    Deposit (AED) <span class="text-muted fw-normal">(optional)</span>
                                </label>
                                <input type="number" name="security_deposit" id="security_deposit" value="{{ old('security_deposit') }}"
                                       class="form-control @error('security_deposit') is-invalid @enderror" min="0">
                                @error('security_deposit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="total_beds" class="form-label">Total beds</label>
                                <input type="number" name="total_beds" id="total_beds" value="{{ old('total_beds', 1) }}"
                                       class="form-control @error('total_beds') is-invalid @enderror" min="1" max="20" required>
                                @error('total_beds')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label for="available_beds" class="form-label">Available now</label>
                                <input type="number" name="available_beds" id="available_beds" value="{{ old('available_beds', 1) }}"
                                       class="form-control @error('available_beds') is-invalid @enderror" min="0" max="20" required>
                                @error('available_beds')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" name="bills_included" id="bills_included" value="1"
                                           class="form-check-input" @checked(old('bills_included'))>
                                    <label for="bills_included" class="form-check-label">
                                        Bills (DEWA, internet) included in the rent
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- House rules --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h2 class="h6 text-uppercase text-muted mb-3">House rules</h2>
                        <textarea name="house_rules" id="house_rules" rows="3"
                                  class="form-control @error('house_rules') is-invalid @enderror"
                                  placeholder="No smoking. No visitors after 10pm.">{{ old('house_rules') }}</textarea>
                        @error('house_rules')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-dark px-4">Publish listing</button>
                    <a href="{{ route('owner.listings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection