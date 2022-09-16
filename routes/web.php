<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataPegawaiController;
use App\Http\Controllers\Admin\TesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Pegawai\AbsensiController as PegawaiAbsensiController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\ProfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Admin
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::prefix('data-pegawai')->group(function () {
            Route::get('/', [DataPegawaiController::class, 'index'])->name('admin.dataPegawai');
            Route::get('/tambah', [DataPegawaiController::class, 'tambah'])->name('admin.dataPegawai.tambah');
            Route::post('/tambah', [DataPegawaiController::class, 'tambahProses'])->name('admin.dataPegawai.tambah');
            Route::get('/{id}', [DataPegawaiController::class, 'detail'])->name('admin.dataPegawai.detail');
            Route::get('/{id}/edit', [DataPegawaiController::class, 'edit'])->name('admin.dataPegawai.edit');
            Route::post('/{id}/edit', [DataPegawaiController::class, 'editProses'])->name('admin.dataPegawai.edit');
            Route::delete('/{id}/edit', [DataPegawaiController::class, 'delete'])->name('admin.dataPegawai.edit');
        });

        Route::prefix('absensi')->group(function () {
            Route::get('/', [AbsensiController::class, 'index'])->name('admin.absensi');
            Route::get('/tambah', [AbsensiController::class, 'tambah'])->name('admin.absensi.tambah');
            Route::post('/tambah', [AbsensiController::class, 'tambahProses'])->name('admin.absensi.tambah');
        });
    });
});

// Pegawai
Route::group(['middleware' => ['auth', 'pegawai']], function () {
    Route::prefix('pegawai')->group(function () {
        Route::get('/dashboard', [PegawaiDashboardController::class, 'index'])->name('pegawai.dashboard');

        Route::prefix('profil')->group(function () {
            Route::get('/', [ProfilController::class, 'index'])->name('pegawai.profil');
            Route::get('/edit', [ProfilController::class, 'edit'])->name('pegawai.profil.edit');
            Route::post('/edit', [ProfilController::class, 'editProses'])->name('pegawai.profil.edit');
            //upload Foto Profil
            Route::get('/upload', [ProfilController::class, 'upload'])->name('pegawai.profil.upload');
            Route::post('/crop', [ProfilController::class, 'crop'])->name('crop-foto');
        });

        Route::prefix('absensi')->group(function () {
            Route::get('/', [PegawaiAbsensiController::class, 'index'])->name('pegawai.absensi');
            Route::get('/tambah', [PegawaiAbsensiController::class, 'tambah'])->name('pegawai.absensi.tambah');
            Route::post('/tambah', [PegawaiAbsensiController::class, 'tambahProses'])->name('pegawai.absensi.tambah');
        });
    });
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [MemberController::class, 'show'])->name('memberHome');
});

// TES
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/tes', [TesController::class, 'index'])->name('admin.tes');
        Route::post('/tes', [TesController::class, 'tambah'])->name('admin.tes.tambah');
    });
});
