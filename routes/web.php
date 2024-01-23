<?php

use App\Models\Utusan;
use App\Models\Peserta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtusanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PesertaController;

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
Route::view('/undangan', 'undangan')->name('undangan');
Route::view('/absensi', 'absensi')->name('absensi');
Route::get('/peserta', function() {
  return view('peserta', [
  'pesertas' => Peserta::all()
  ]);
})->name('peserta');

Route::view('/dashboard', 'dashboard.index')->name('dashboard.index');
Route::view('/dashboard/absensi', 'dashboard.absensi.index')->name('dashboard.absensi');
Route::resource('/dashboard/utusan', UtusanController::class);
Route::resource('/dashboard/peserta', PesertaController::class);

Route::post('/dashboard/absensi', [PesertaController::class, 'absensi'])->name('peserta.absensi');
Route::post('/dashboard/peserta/import', [PesertaController::class, 'import'])->name('peserta.import');
Route::post('/dashboard/peserta/reset', [PesertaController::class, 'reset'])->name('peserta.reset');