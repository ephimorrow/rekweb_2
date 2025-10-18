<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SeminarController as AdminSeminarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SeminarController as PublicSeminarController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Seminar Public Routes - Menggunakan Controller
Route::get('/seminars', [PublicSeminarController::class, 'index'])->name('seminars.index');
Route::get('/seminars/{seminar}', [PublicSeminarController::class, 'show'])->name('seminars.show');
Route::post('/seminars/{seminar}/register', [RegistrationController::class, 'store'])->name('seminars.register');

// Authentication Routes (Custom)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes (Protected by auth middleware)
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('seminars', AdminSeminarController::class)->names('admin.seminars');
});

// Redirect after login based on user role
Route::get('/home', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->name('home.redirect');