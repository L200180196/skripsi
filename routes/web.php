<?php

use App\Http\Controllers\AdminKelas;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataDiriSiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataUser;
use App\Http\Controllers\DataUserGuruController;
use App\Http\Controllers\DataUserSiswaController;
use App\Http\Controllers\KeterampilanAgamaController;
use App\Http\Controllers\Nilai;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SpiritualController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\KeterampilanController;
use App\Http\Controllers\KeterampilanMatematikaController;
use App\Http\Controllers\KeterampilanSeniController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PengetahuanAgamaController;
use App\Http\Controllers\PengetahuanBahasaIndonesiaController;
use App\Http\Controllers\PengetahuanMatematikaController;
use App\Http\Controllers\PengetahuanOlahragaController;
use App\Http\Controllers\PengetahuanPancasilaController;
use App\Http\Controllers\PengetahuanSeniController;
use App\Http\Controllers\SetWaliKelas;
use App\Http\Controllers\SetMataPelajaran;
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

Route::get('/',[LoginController::class, 'index'])->middleware('guest');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth'); 
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/dashboard/nilai', [NilaiController::class, 'index'])->middleware('auth');
Route::post('/dashboard/nilai', [NilaiController::class, 'select'])->middleware('auth');
Route::resource('/dashboard/nilai/spiritual', SpiritualController::class)->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/sosial', SosialController::class)->middleware(['auth', 'cekUser']);

//Nilai - Pengetahuan
Route::resource('/dashboard/nilai/pengetahuan/pendidikan-agama-dan-budi-pekerti', PengetahuanController::class)
->parameters(['pendidikan-agama-dan-budi-pekerti' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/pendidikan-pancasila-dan-kewarganegaraan', PengetahuanController::class)
->parameters(['pendidikan-pancasila-dan-kewarganegaraan' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/bahasa-indonesia', PengetahuanController::class)
->parameters(['bahasa-indonesia' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/seni-budaya-dan-prakarya', PengetahuanController::class)
->parameters(['seni-budaya-dan-prakarya' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/pendidikan-jasmani-olahraga-dan-kesehatan', PengetahuanController::class)
->parameters(['pendidikan-jasmani-olahraga-dan-kesehatan' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/bahasa-jawa', PengetahuanController::class)
->parameters(['bahasa-jawa' => 'data'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/pengetahuan/matematika', PengetahuanController::class)
->parameters(['matematika' => 'data'])->middleware(['auth', 'cekUser']);

//Nilai - Keterampilan
Route::resource('/dashboard/nilai/keterampilan/pendidikan-agama-dan-budi-pekerti', KeterampilanController::class)
->parameters(['pendidikan-agama-dan-budi-pekerti' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/pendidikan-pancasila-dan-kewarganegaraan', KeterampilanController::class)
->parameters(['pendidikan-pancasila-dan-kewarganegaraan' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/bahasa-indonesia', KeterampilanController::class)
->parameters(['bahasa-indonesia' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/seni-budaya-dan-prakarya', KeterampilanSeniController::class)
->parameters(['seni-budaya-dan-prakarya' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/pendidikan-jasmani-olahraga-dan-kesehatan', KeterampilanController::class)
->parameters(['pendidikan-jasmani-olahraga-dan-kesehatan' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/bahasa-jawa', KeterampilanController::class)
->parameters(['bahasa-jawa' => 'keterampilan'])->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/nilai/keterampilan/matematika', KeterampilanController::class)
->parameters(['matematika' => 'keterampilan'])->middleware(['auth', 'cekUser']);


Route::resource('/dashboard/data-diri-siswa', DataDiriSiswaController::class)->middleware(['auth', 'cekUser']);
Route::resource('/dashboard/data-user-guru', DataUserGuruController::class)->middleware(['auth', 'cekAdmin']);
Route::resource('/dashboard/data-user-siswa', DataUserSiswaController::class)->middleware(['auth', 'cekAdmin']);

Route::get('/dashboard/data-user-guru/wali-kelas/{id}/edit', [SetWaliKelas::class, 'edit'])->middleware(['auth', 'cekAdmin']);
Route::put('/dashboard/data-user-guru/wali-kelas/{id}', [SetWaliKelas::class, 'update'])->middleware(['auth', 'cekAdmin']);
Route::delete('/dashboard/data-user-guru/wali-kelas/{id}', [SetWaliKelas::class, 'destroy'])->middleware(['auth', 'cekAdmin']);
Route::put('/dashboard/data-user-guru/mapel/{id}', [SetMataPelajaran::class, 'delete'])->middleware(['auth', 'cekAdmin']);
Route::get('/dashboard/data-user-guru/mapel/{id}/edit', [SetMataPelajaran::class, 'editMapel'])->middleware(['auth', 'cekAdmin']);
Route::get('/dashboard/data-user-guru/mapel-kelas/{id}/edit', [SetMataPelajaran::class, 'editKelas'])->middleware(['auth', 'cekAdmin']);
Route::put('/dashboard/data-user-guru/mapel-kelas/{id}', [SetMataPelajaran::class, 'update'])->middleware(['auth', 'cekAdmin']);


Route::get('/dashboard/kelas', [AdminKelas::class, 'index'])->middleware(['auth', 'cekAdmin']);
Route::post('/dashboard/kelas', [AdminKelas::class, 'select'])->middleware(['auth', 'cekAdmin']);

Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);