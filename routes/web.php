<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Food category routes
Route::get('/makanan-berat', [HomeController::class, 'makananBerat'])->name('makanan-berat');
Route::get('/jajanan', [HomeController::class, 'jajanan'])->name('jajanan');
Route::get('/minuman', [HomeController::class, 'minuman'])->name('minuman');
Route::get('/frozen-food', [HomeController::class, 'frozenFood'])->name('frozen-food');
Route::get('/makanan/{id}', [HomeController::class, 'showMakanan'])->name('makanan.show');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('/makanan/{id}/rating', [\App\Http\Controllers\RatingController::class, 'store'])->name('makanan.rating');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Tempat Makan CRUD
    Route::get('/tempat-makan', [AdminController::class, 'tempatMakan'])->name('tempat-makan');
    Route::get('/tempat-makan/create', [AdminController::class, 'createTempatMakan'])->name('tempat-makan.create');
    Route::post('/tempat-makan', [AdminController::class, 'storeTempatMakan'])->name('tempat-makan.store');
    Route::get('/tempat-makan/{id}/edit', [AdminController::class, 'editTempatMakan'])->name('tempat-makan.edit');
    Route::put('/tempat-makan/{id}', [AdminController::class, 'updateTempatMakan'])->name('tempat-makan.update');
    Route::delete('/tempat-makan/{id}', [AdminController::class, 'destroyTempatMakan'])->name('tempat-makan.destroy');
    
    // Makanan CRUD
    Route::get('/makanan', [AdminController::class, 'makanan'])->name('makanan');
    Route::get('/makanan/create', [AdminController::class, 'createMakanan'])->name('makanan.create');
    Route::post('/makanan', [AdminController::class, 'storeMakanan'])->name('makanan.store');
    Route::get('/makanan/{id}/edit', [AdminController::class, 'editMakanan'])->name('makanan.edit');
    Route::put('/makanan/{id}', [AdminController::class, 'updateMakanan'])->name('makanan.update');
    Route::delete('/makanan/{id}', [AdminController::class, 'destroyMakanan'])->name('makanan.destroy');
});
