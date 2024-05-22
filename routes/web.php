<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MuridController;
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

Route::get('/', function () {
    $nama = 'eko';
    $kelas =11;

    return view('home.index',['nama_lengkap' => '$nama','kelassaya'=>'$kelas']);
});


//buat route buat murid
Route::get('/murid/tambah',[MuridController::class,'tambah'])->name('tambah_siswa');
Route::post('/murid/aksi_siswa',[MuridController::class, 'aksi_siswa'])->name('aksi_siswa');
//kelas
Route::post('/kelas/aksi_tambah',[Kelascontroller::class, 'aksi_tambah'])->name('aksi_tambah');
Route::get('/kelas/tambah',[KelasController::class,'tambah'])->name('tambah_kelas');

Route::get('/beranda', [HomeController::class,'index'])->name('home');
Route::get('/siswa', [MuridController::class,'siswa'])->name('murid');
Route::get('/kelas', [KelasController::class,'kelas'])->name('faslun');

//buat route siswa
// Route::get('/siswa',[MuridController::class, 'index'])->name('murid');

// route::get('/faslun', [KelasController::class,'index'])->name('kelas');
