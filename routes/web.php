<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\ModulController as PublicModulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ============================================================
// ROUTE LOGIN FALLBACK (untuk middleware auth)
// ============================================================
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// ============================================================
// HALAMAN PUBLIK (Frontend)
// ============================================================
Route::view('/', 'publik.home')->name('home');
Route::get('/modul', [PublicModulController::class, 'index'])->name('publik.modul.index');
Route::get('/modul/{id}', [PublicModulController::class, 'show'])->name('publik.modul.show');
Route::view('/about', 'publik.about')->name('about');
Route::view('/contact', 'publik.contact')->name('contact');

// Kirim pesan dari halaman Contact (simulasi)
Route::post('/contact', function (\Illuminate\Http\Request $request) {
    return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Terima kasih sudah menghubungi MyModul.');
})->name('contact.send');

// ============================================================
// ADMIN LOGIN (tanpa middleware auth)
// ============================================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// ============================================================
// ADMIN PROTECTED ROUTES (harus login)
// ============================================================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Export PDF (harus didefinisikan SEBELUM resource agar tidak bentrok)
    Route::get('/modul/pdf', [ModulController::class, 'exportPdf'])->name('modul.pdf');

    // CRUD Modul (tanpa show karena pakai route publik)
    Route::resource('modul', ModulController::class)->except(['show'])->parameters([
        'modul' => 'id'
    ]);

});