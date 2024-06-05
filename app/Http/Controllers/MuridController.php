<?php

namespace App\Http\Controllers;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function siswa (Request $request){
        $search=$request->Search;
        $dataSiswa=Murid::paginate(2);
        return view('murid.index',['Search'=>$search,'datasiswa'=>$dataSiswa]);
    }
    public function tambah(){
        return view('murid.tambah');
    }
    public function aksi_siswa(Request $request){
       Murid::insert([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat
       ]);
       return redirect()->route('murid');
    }
    public function edit($id){
        $dataSiswa= Murid::where('id',$id)->first();

        return view('murid.edit',[
            'datasiswa'=>$dataSiswa
        ]);
    }
    public function hapus($id){
        Murid::where('id',$id)->delete();
        return redirect()->route('murid');
    }
}
