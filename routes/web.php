<?php

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/admin/pengaduan/{id_pengaduan}/selesai', function($id_pengaduan) {
    $pengaduan = \App\Models\Pengaduan::findOrFail($id_pengaduan);
    $pengaduan->status = 'selesai';
    $pengaduan->save();
    return redirect('/admin')->with('success', 'Pengaduan telah diselesaikan!');
})->name('admin.pengaduan.selesai')->middleware('auth:petugas');

Route::middleware(['auth:petugas'])->group(function () {
    // Form tanggapan (GET)
    Route::get('/admin/pengaduan/{id_pengaduan}/tanggapan', [TanggapanController::class, 'create'])
        ->name('admin.tanggapan.create');

    Route::post('/admin/pengaduan/{id_pengaduan}/tanggapan', [TanggapanController::class, 'store'])
        ->name('admin.tanggapan.store');
});

Route::post('/petugas/pengaduan/{id_pengaduan}/selesai', function($id_pengaduan) {
    $pengaduan = \App\Models\Pengaduan::findOrFail($id_pengaduan);
    $pengaduan->status = 'selesai';
    $pengaduan->save();
    return redirect('/petugas')->with('success', 'Pengaduan telah diselesaikan!');
})->name('admin.pengaduan.selesai')->middleware('auth:petugas');

Route::middleware(['auth:petugas'])->group(function () {
    // Form tanggapan (GET)
    Route::get('/petugas/pengaduan/{id_pengaduan}/tanggapan', [TanggapanController::class, 'create'])
        ->name('admin.tanggapan.create');

    Route::post('/petugas/pengaduan/{id_pengaduan}/tanggapan', [TanggapanController::class, 'store'])
        ->name('admin.tanggapan.store');
});

Route::middleware(['auth:petugas','can:isAdmin'])->group(function () {
    Route::get('/admin/akun/create', [AdminController::class, 'create'])->name('admin.akun.create');
    Route::post('/admin/akun/store', [AdminController::class, 'store'])->name('admin.akun.store');
    Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');
});

Gate::define('isAdmin', function ($user) {
    return $user->level === 'admin';
});

Route::middleware(['auth:petugas'])->group(function () {
    Route::get('/admin/pengaduan/{id}/tanggapan', [TanggapanController::class, 'create'])->name('admin.tanggapan.create');
    Route::post('/admin/pengaduan/{id}/tanggapan', [TanggapanController::class, 'store'])->name('admin.tanggapan');
});

Route::get('/login', [Authcontroller::class, "ShowLoginForm"])->name('login');
Route::post('/login', [Authcontroller::class, "login"]);

Route::get('/regis', [Authcontroller::class, "showRegisterForm"])->name('register');
Route::post('/regis', [Authcontroller::class, "register"]);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/masyarakat', function () {
    $pengaduan = Pengaduan::all();
    return view('masyarakat', compact('pengaduan'));
})->middleware('auth'); // default guard: web/masyarakat

Route::get('/petugas', function () {
        $pengaduan = Pengaduan::all();
    return view('petugas', compact('pengaduan'));
})->middleware('auth:petugas');

Route::get('/admin', function () {
    // Ambil semua pengaduan, atau filter sesuai kebutuhan
    $pengaduan = Pengaduan::all();
    return view('admin', compact('pengaduan'));
})->middleware('auth:petugas');

Route::post('/pengaduan', [PengaduanController::class, 'store'])->middleware('auth')->name('pengaduan.store');

Route::post('/logout', [Authcontroller::class, 'logout'])->name('logout');
