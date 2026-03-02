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

    // Admin Login
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');

    // Admin Register
    Route::get('/admin/register', [AuthController::class, 'showAdminRegister'])->name('admin.register');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // Dashboard — Halaman utama admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // Rawat Jalan — Manajemen pasien rawat jalan
        Route::get('/outpatient', function () {
            return view('admin.outpatient');
        })->name('outpatient');

        // Registrasi — Pendaftaran pasien baru
        Route::get('/registration', function () {
            return view('admin.registration');
        })->name('registration');

        // Rekam Medis Elektronik (EMR) — Data rekam medis pasien
        Route::get('/emr', function () {
            return view('admin.emr');
        })->name('emr');

        // Apotek — Manajemen obat dan resep
        Route::get('/pharmacy', function () {
            return view('admin.pharmacy');
        })->name('pharmacy');

        // Kasir — Pembayaran dan transaksi
        Route::get('/cashier', function () {
            return view('admin.cashier');
        })->name('cashier');

        // Profil — Pengaturan profil pengguna
        Route::get('/profile', function () {
            return view('admin.profile');
        })->name('profile');

        // Pesan — Pusat pesan / notifikasi
        Route::get('/messages', function () {
            return view('admin.messages');
        })->name('messages');
    });

    // User Routes
    Route::middleware('role:user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
    });
});
