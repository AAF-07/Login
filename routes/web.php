<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [Authcontroller::class, "ShowLoginForm"])->name('login');
Route::post('/login', [Authcontroller::class, "login"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/petugas', function () {
    return view('petugas');
})->middleware('auth');
Route::get('/masyarakat', function () {
    return view('masyarakat');
})->middleware('auth');



Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
