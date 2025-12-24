<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProsesKTPController;
use App\Http\Controllers\TransactionController;

// =======================
// HALAMAN UTAMA (WELCOME)
// =======================
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// =======================
// HALAMAN LIST PENGAJUAN
// =======================
Route::get('/categories', [PengajuanController::class, 'categories'])->name('categories');

// =======================
// APPROVE
// =======================
Route::get('/categories/approve/page/{id}', [PengajuanController::class, 'approvePage'])->name('categories.approve.page');
Route::get('/categories/approve/{id}', [PengajuanController::class, 'approve'])->name('categories.approve');

// =======================
// REJECT
// =======================
Route::get('/categories/reject/page/{id}', [PengajuanController::class, 'rejectPage'])->name('categories.reject.page');
Route::get('/categories/reject/{id}', [PengajuanController::class, 'reject'])->name('categories.reject');

// =======================
// FORM PENGAJUAN BARU
// =======================
Route::get('/pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');

Route::get('/informasi', [WelcomeController::class, 'informasi'])->name('informasi');
Route::post('/informasi', [WelcomeController::class, 'informasi']);

// LOGIN / REGISTER views
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// PROSES (POST)
Route::post('/login-proses', [WelcomeController::class, 'loginProses'])->name('login.proses');
Route::post('/register-proses', [WelcomeController::class, 'registerProses'])->name('register.proses');

// LOGOUT (opsional)
Route::post('/logout', [WelcomeController::class, 'logout'])->name('logout');
Route::post('/register-proses', [WelcomeController::class, 'registerProses'])->name('register.proses');

Route::get('/dashboard-admin', function () {
    if (!session()->get('login_admin')) {
        return redirect('/login')->with('error', 'Harus login admin!');
    }
    return view('admin.dashboard');
});

Route::get('/admin/proses-ektp', [ProsesKTPController::class, 'index'])->name('proses.ektp');
Route::get('/admin/cetak-ktp/{id}', [ProsesKTPController::class, 'cetak'])->name('cetak.ktp');

// =======================
// TRANSACTION E-KTP
// =======================
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');

// CETAK HALAMAN HTML
Route::get('/cetak-ktp/{id}', [TransactionController::class, 'viewKTP'])->name('cetak.ktp');

// CETAK PDF (FIXED)
Route::get('/cetak-ktp-pdf/{id}', [TransactionController::class, 'cetakKTP'])
    ->name('cetak.ktp.pdf');
