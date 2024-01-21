<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UtusanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'index')->name('home');
Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
Route::view('/dashboard/absensi', 'dashboard.absensi.index')->name('dashboard.index');
Route::resource('/dashboard/utusan', UtusanController::class);
Route::resource('/dashboard/peserta', PesertaController::class);

Route::post('/dashboard/absensi', [PesertaController::class, 'absensi'])->name('peserta.absensi');