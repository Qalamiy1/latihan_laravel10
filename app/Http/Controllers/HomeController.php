<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Murid;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(){
    // $nama='eko';
    // $kelas = '11 sija';

    // return view('home.index',
    // ['nama_lengkap'=>$nama,'kelas'=>$kelas]);
    $jumlah_kelas=Kelas::count();
    $jumlah_siswa=Murid::count();

    return view('home.index',[
      'jumlah_kelas'=>$jumlah_kelas,
      'jumlah_siswa'=>$jumlah_siswa
    ]);
  }
}
