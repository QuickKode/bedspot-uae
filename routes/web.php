<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboard;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seeker\DashboardController as SeekerDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:seeker'])->prefix('seeker')->name('seeker.')->group(function () {
    Route::get('dashboard', [SeekerDashboard::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('dashboard', [OwnerDashboard::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

require __DIR__.'/auth.php';
