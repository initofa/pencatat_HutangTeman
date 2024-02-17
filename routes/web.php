<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HutangTemanController;
use App\Http\Controllers\TambahDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/hutangtemans', HutangTemanController::class);

Route::get('/tambahdata', [TambahDataController::class, 'tambah']);

