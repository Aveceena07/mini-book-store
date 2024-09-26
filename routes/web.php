<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

// Rute untuk menampilkan halaman register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name(
    'register'
);

// Rute untuk menangani proses registrasi
Route::post('register', [AuthController::class, 'register']);

// Rute untuk menampilkan halaman login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Rute untuk menangani proses login
Route::post('login', [AuthController::class, 'login']);

// Rute untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute resource untuk kategori
Route::resource('categories', CategoryController::class)->middleware('auth');

// Rute resource untuk buku
Route::resource('books', BookController::class)->middleware('auth');

Route::get('books/search', [BookController::class, 'search'])
    ->name('books.search')
    ->middleware('auth');

Route::get('books/search', [BookController::class, 'search'])->name(
    'books.search'
);

// Rute default yang mengarahkan ke halaman register
Route::get('/', function () {
    return redirect()->route('register');
});