<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes (Guest only)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Admin Panel)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard — Halaman utama admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Rawat Jalan — Manajemen pasien rawat jalan
    Route::get('/outpatient', function () {
        return view('admin.outpatient');
    })->name('admin.outpatient');

    // Registrasi — Pendaftaran pasien baru
    Route::get('/registration', function () {
        return view('admin.registration');
    })->name('admin.registration');

    // Rekam Medis Elektronik (EMR) — Data rekam medis pasien
    Route::get('/emr', function () {
        return view('admin.emr');
    })->name('admin.emr');

    // Apotek — Manajemen obat dan resep
    Route::get('/pharmacy', function () {
        return view('admin.pharmacy');
    })->name('admin.pharmacy');

    // Kasir — Pembayaran dan transaksi
    Route::get('/cashier', function () {
        return view('admin.cashier');
    })->name('admin.cashier');

    // Profil — Pengaturan profil pengguna
    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('admin.profile');

    // Pesan — Pusat pesan / notifikasi
    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('admin.messages');
});
