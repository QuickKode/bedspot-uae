@extends('layouts.app')

@section('title', 'My Listings')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">My Listings</h1>
            <p class="text-muted mb-0">{{ $listings->total() }} total</p>
        </div>
        <a href="{{ route('owner.listings.create') }}" class="btn btn-dark">Add listing</a>
    </div>

    @if ($listings->isEmpty())
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <p class="text-muted mb-3">You haven't listed anything yet.</p>
                <a href="{{ route('owner.listings.create') }}" class="btn btn-dark">Create your first listing</a>
            </div>
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Listing</th>
                            <th>Area</th>
                            <th>Rent</th>
                            <th>Beds</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listings as $listing)
                            <tr>
                                <td>
                                    <div class="fw-semibold">{{ $listing->title }}</div>
                                    <div class="small text-muted">{{ $listing->room_type->label() }}</div>
                                </td>
                                <td>
                                    {{ $listing->area }}
                                    <div class="small text-muted">{{ $listing->emirate }}</div>
                                </td>
                                <td class="text-nowrap">AED {{ number_format($listing->monthly_rent, 0) }}</td>
                                <td>{{ $listing->available_beds }} / {{ $listing->total_beds }}</td>
                                <td>
                                    <span class="badge {{ $listing->status->badgeClass() }}">
                                        {{ $listing->status->label() }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            {{ $listings->links() }}
        </div>
    @endif

</div>
@endsection