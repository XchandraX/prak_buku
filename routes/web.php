<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerBook;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [ControllerBook::class, 'index'])->name('buku.index');

Route::get('/buku/create', [ControllerBook::class, 'create'])->name('buku.create');

Route::post('/buku', [ControllerBook::class, 'store'])->name('buku.store');

Route::get('/buku/{buku}', [ControllerBook::class, 'show'])->name('buku.show');

Route::get('/buku/{buku}/edit', [ControllerBook::class, 'edit'])->name('buku.edit');

Route::put('/buku/{buku}', [ControllerBook::class, 'update'])->name('buku.update');

Route::delete('/buku/{buku}', [ControllerBook::class, 'destroy'])->name('buku.destroy');
