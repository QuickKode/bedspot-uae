@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="h3">Owner Dashboard</h1>
    <p class="text-muted">Welcome back, {{ auth()->user()->name }}.</p>

    <a href="{{ route('owner.listings.index') }}" class="btn btn-dark mt-2">My listings</a>
</div>
@endsection