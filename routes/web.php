<?php

declare(strict_types=1);

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\RegisteredUsersController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\InternDashboardController;
use Illuminate\Support\Facades\Route;

// ── Public ─────────────────────────────────────────────────
Route::get('/', fn () => view('home'));

// ── Guest only ─────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUsersController::class, 'create']);
    Route::post('/register', [RegisteredUsersController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'login']);
});

// ── Logout (any authenticated user) ───────────────────────
Route::post('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth');

// ── Intern dashboard ───────────────────────────────────────
Route::middleware(['auth', 'intern'])->group(function () {
    Route::get('/dashboard', [InternDashboardController::class, 'index']);
});

// ── Admin dashboard ────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/interns/{user}', [AdminDashboardController::class, 'show']);
    Route::post('/interns/{user}/status', [AdminDashboardController::class, 'updateStatus']);
});
