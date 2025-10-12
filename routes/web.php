<?php

use App\Http\Controllers\about;
use App\Http\Controllers\myclass;
use App\Http\Controllers\tersedia;
use App\Http\Controllers\Controller;
use App\Http\Controllers\datagedung;
use App\Http\Controllers\detailKelas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ketersediaan;
use App\Http\Controllers\tambahmatkul;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\teamcontroller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\GantiController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminSessionController;

Route::middleware(RoleMiddleware::class)->group(function () {
    // Rute CRUD Gedung
    Route::get('admin/gedung', [AdminSessionController::class, 'indexGedung'])->name('admin.gedung.index');
    Route::post('admin/gedung', [AdminSessionController::class, 'storeGedung'])->name('admin.gedung.store');
    Route::put('admin/gedung/{id}', [AdminSessionController::class, 'updateGedung'])->name('admin.gedung.update');
    Route::delete('admin/gedung/{id}', [AdminSessionController::class, 'destroyGedung'])->name('admin.gedung.destroy');

    // Rute CRUD Kelas
    Route::get('admin/kelas', [AdminSessionController::class, 'indexKelas'])->name('admin.kelas.index');
    Route::post('admin/kelas', [AdminSessionController::class, 'storeKelas'])->name('admin.kelas.store');
    Route::put('admin/kelas/{id}', [AdminSessionController::class, 'updateKelas'])->name('admin.kelas.update');
    Route::delete('admin/kelas/{id}', [AdminSessionController::class, 'destroyKelas'])->name('admin.kelas.destroy');

    // Rute CRUD Matkul
    Route::get('admin/matkul', [AdminSessionController::class, 'indexMatkul'])->name('admin.matkul.index');
    Route::post('admin/matkul', [AdminSessionController::class, 'storeMatkul'])->name('admin.matkul.store');
    Route::put('admin/matkul/{id}', [AdminSessionController::class, 'updateMatkul'])->name('admin.matkul.update');
    Route::delete('admin/matkul/{id}', [AdminSessionController::class, 'destroyMatkul'])->name('admin.matkul.destroy');

    // Rute CRUD Matkul Ganti
    Route::get('admin/matkulganti', [AdminSessionController::class, 'indexMatkulGanti'])->name('admin.matkulganti.index');
    Route::post('admin/matkulganti', [AdminSessionController::class, 'storeMatkulGanti'])->name('admin.matkulganti.store');
    Route::put('admin/matkulganti/{id}', [AdminSessionController::class, 'updateMatkulGanti'])->name('admin.matkulganti.update');
    Route::delete('admin/matkulganti/{id}', [AdminSessionController::class, 'destroyMatkulGanti'])->name('admin.matkulganti.destroy');
    // Rute CRUD pesan
    Route::get('admin/pesan', [AdminSessionController::class, 'indexpesan'])->name('admin.pesan.index');
    Route::post('admin/pesan', [AdminSessionController::class, 'storepesan'])->name('admin.pesan.store');
    Route::put('admin/pesan/{id}', [AdminSessionController::class, 'updatepesan'])->name('admin.pesan.update');
    Route::delete('admin/pesan/{id}', [AdminSessionController::class, 'destroypesan'])->name('admin.pesan.destroy');
    // Rute CRUD User
    Route::get('admin/user', [AdminSessionController::class, 'indexuser'])->name('admin.user.index');
    Route::post('admin/user', [AdminSessionController::class, 'storeuser'])->name('admin.user.store');
    Route::put('admin/user/{id}', [AdminSessionController::class, 'updateuser'])->name('admin.user.update');
    Route::delete('admin/user/{id}', [AdminSessionController::class, 'destroyuser'])->name('admin.user.destroy');
});

Route::get('guest/kelas/{id}', [myclass::class, 'guest'])->name('guest.kelas.show');
Route::get('about', [about::class, 'index'])->name('about');



Route::get('/', function () {
    return view('welcome');
});



    Route::get('/dashboard', [ketersediaan::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    // ▼▼▼ TAMBAHKAN RUTE INI DI DALAM GRUP ▼▼▼
    Route::get('/panduan-api', function () {
        return view('panduan-api');
    })->name('panduan.api');
});
Route::get('/tersedia', [tersedia::class, 'tersediaFilter'])->name('tersedia.tersediaFilter');
Route::get('/dipakai', [tersedia::class, 'dipakaiFilter'])->name('dipakai.dipakaiFilter');
Route::get('/dipesan', [tersedia::class, 'dipesanFilter'])->name('dipesan.dipesanFilter');

Route::get('/negotiate/{id}', [ProfileController::class, 'negotiate'])->name('negotiatea');

Route::get('/myclass', [myclass::class, 'index'])->name('myclass.index');
Route::delete('/myclass/{id}', [myclass::class, 'destroy'])->name('myclass.destroy');
 Route::get('/team', [teamcontroller::class, 'index'])->name('team.index');
 Route::post('/pesan/store', [PesanController::class, 'store'])->name('pesan.store');
 Route::post('/ganti/store', [GantiController::class, 'store'])->name('ganti.store');
 Route::delete('/matkulganti/{id}', [GantiController::class, 'destroymg'])->name('matkulganti.destroymg');

 Route::get('/detail/{id}', [detailKelas::class, 'index'])->name('detail.index');

 // Route untuk membatalkan mata kuliah
Route::post('/myclass/matkul/cancel/{id}', [myclass::class, 'cancelMatkul'])->name('myclass.cancelMatkul');

// Route untuk mengubah status mata kuliah menjadi sesuai
Route::post('/myclass/matkul/setSesuai/{id}', [myclass::class, 'setMatkulSesuai'])->name('myclass.setMatkulSesuai');

Route::post('/tambah', [tambahmatkul::class, 'tambahmatkul'])->name('tambah.tambahmatkul');
Route::get('/gedung/{id}', [datagedung::class, 'index'])->name('datagedung.index');

require __DIR__.'/auth.php';
