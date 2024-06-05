<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NilaiController;
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



//middleware
Route::middleware(['auth.check'])->group(function(){

    Route::get('/beranda', [HomeController::class,'index'])->name('home');

    //buat nilai
Route::post('nilai/aksi_edit/{id}',[NilaiController::class,'aksi_edit_nilai'])->name('aksi_edit_nilai');
Route::get('nilai/edit/{id}',[NilaiController::class,'edit'])->name('edit_nilai');
Route::post('nilai/hapus/{id}',[NilaiController::class,'hapus'])->name('hapus_nilai');
Route::post('nilai.aksi_tambah_nilai',[NilaiController::class,'aksi_tambah_nilai'])->name('aksi_tambah_nilai');
Route::get('nilai',[NilaiController::class,'index'])->name('nilai');
Route::get('nilai/tambah',[NilaiController::class,'tambah'])->name('tambah_nilai');

//buat route buat murid
Route::get('/murid/tambah',[MuridController::class,'tambah'])->name('tambah_siswa');
Route::post('/murid/aksi_siswa',[MuridController::class, 'aksi_siswa'])->name('aksi_siswa');
//kelas
Route::post('/kelas/aksi_tambah',[Kelascontroller::class, 'aksi_tambah'])->name('aksi_tambah');
Route::get('/kelas/tambah',[KelasController::class,'tambah'])->name('tambah_kelas');


Route::get('/siswa', [MuridController::class,'siswa'])->name('murid');
Route::get('/kelas', [KelasController::class,'kelas'])->name('faslun');
//route buat edit
Route::get('kelas/edit/{id}',[KelasController::class,'edit'])->name('edit_kelas');
//buat hapus
Route::post('kelas.hapus.{id}',[KelasController::class,'hapus'])->name('hapus');
//route buat edit siswa
Route::get('murid/edit/{id}',[MuridController::class,'edit'])->name('edit');
//route buat hapus siswa
Route::get('murid.hapus.{id}',[MuridController::class,'hapus'])->name('hapus');
//aksi edit
Route::post('kelas/aksi_edit/{id}',[KelasController::class,'aksi_edit'])->name('aksi_edit');
//logout
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::get('profile',[ProfileController::class,'profile'])->name('profile');
Route::post('aksi_edit_profile',[ProfileController::class,'aksi_edit_profile'])->name('aksi_edit_profile');
});
//login
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'aksi_login'])->name('aksi_login');
// register
Route::post('/register',[AuthController::class,'aksi_register'])->name('aksi_register');
Route::get('/register',[AuthController::class,'register'])->name('register');


//buat route siswa
// Route::get('/siswa',[MuridController::class, 'index'])->name('murid');

// route::get('/faslun', [KelasController::class,'index'])->name('kelas');
