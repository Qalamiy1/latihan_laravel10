<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
class KelasController extends Controller
{
    public function kelas(Request $request){
        $search=$request->Search;
        $dataKelas=Kelas::where('kelas','like','%'.$search.'%')->get();

        return view('kelas.index',['Search'=>$search,'datakelas'=>$dataKelas]);
    }
    public function tambah(){
        return view('kelas.tambah');
    }
    public function aksi_tambah( Request $request){
    kelas::insert([
        'kelas' =>$request->kelas  
     ]);
     return redirect()->route('faslun');
    }
}
