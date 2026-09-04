<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function index(Request $request): View
    {
        $listings = $request->user()
            ->listings()
            ->latest()
            ->paginate(10);

        return view('owner.listings.index', compact('listings'));
    }

    public function create(): View
    {
        return view('owner.listings.create');
    }

    public function store(StoreListingRequest $request): RedirectResponse
    {
        $listing = $request->user()->listings()->make($request->validated());

        $listing->slug = Str::slug($request->title).'-'.Str::lower(Str::random(6));
        $listing->save();

        return redirect()
            ->route('owner.listings.index')
            ->with('status', 'Listing created. It will appear publicly once an admin approves it.');
    }
}