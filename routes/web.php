<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SeminarController;
use App\Models\Seminar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Seminar Public Routes
Route::get('/seminars', function () {
    $seminars = Seminar::where('datetime', '>', now())
        ->orderBy('datetime')
        ->paginate(9);
    return view('seminars.index', compact('seminars'));
})->name('seminars.index');

Route::get('/seminars/{seminar}', function (Seminar $seminar) {
    $seminar->load('registrations.participant');
    return view('seminars.show', compact('seminar'));
})->name('seminars.show');

Route::post('/seminars/{seminar}/register', [RegistrationController::class, 'store'])
    ->name('seminars.register');

// Custom Authentication Routes (tanpa laravel/ui)
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('seminars', SeminarController::class)->names('admin.seminars');
});

// Redirect after login
Route::get('/home', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
});