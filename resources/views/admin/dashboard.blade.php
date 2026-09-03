@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="h3">Admin Dashboard</h1>
    <p class="text-muted">Welcome back, {{ auth()->user()->name }}.</p>
</div>
@endsection