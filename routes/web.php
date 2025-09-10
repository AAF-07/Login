<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\PengaduanController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [Authcontroller::class, "ShowLoginForm"])->name('login');
Route::post('/login', [Authcontroller::class, "login"]);

Route::get('/regis', [Authcontroller::class, "showRegisterForm"])->name('register');
Route::post('/regis', [Authcontroller::class, "register"]);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/masyarakat', function () {
    return view('masyarakat');
})->middleware('auth'); // default guard: web/masyarakat

Route::get('/petugas', function () {
    return view('petugas');
})->middleware('auth:petugas');

Route::get('/admin', function () {
    return view('admin');
})->middleware('auth:petugas');

Route::post('/pengaduan', [PengaduanController::class, 'store'])->middleware('auth')->name('pengaduan.store');

Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
