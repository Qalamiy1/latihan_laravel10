<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
class KelasController extends Controller
{
    public function kelas(Request $request){
        $search=$request->Search;
        $dataKelas=Kelas::where('kelas','like','%'.$search.'%')->paginate(3);

        return view('kelas.index',['Search'=>$search,'datakelas'=>$dataKelas]);
    }
    public function tambah(){
        return view('kelas.tambah');
    }
    public function aksi_tambah( Request $request){
        $request->validate([
            'kelas'=>'required'
        
        ],[
            'kelas.required'=>'Kelas wajib disi, tapi ingat yang lebih wajib itu sholat 5 waktu'
        ]);

    kelas::insert([
        'kelas' =>$request->kelas  
     ]);
     return redirect()->route('faslun');
    }
    public function edit($id){
       $dataKelas= kelas::where('id',$id)->first();
        
       return view('kelas.edit',[
        'datakelas'=>$dataKelas
       ]);
    }
    public function hapus($id){
        Kelas::where('id',$id)->delete();
        return redirect()->route('faslun');
    }
    public function aksi_edit(Request $request,$id){
        // echo $id;
        // dd($request->only(['kelas']));
       kelas::where('id',$id)->update($request->only(['kelas']));
       return redirect()->route('faslun');
    }
}
