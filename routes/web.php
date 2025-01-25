<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return redirect('/buku-tamu');
});

Route::get('/buku-tamu', [BukuTamuController::class, 'index'])->name('buku-tamu.index');
Route::post('/buku-tamu/store', [BukuTamuController::class, 'store'])->name('buku-tamu.store');
Route::get('/buku-tamu/daftar-tamu', [BukuTamuController::class, 'detail'])->name('buku-tamu.detail');