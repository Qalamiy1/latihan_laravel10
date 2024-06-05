<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Murid;

class NilaiController extends Controller
{
  public function index(){
        $dataNilai = Nilai::
        select('*','nilai.id as nilai_id')->
        Join('siswa','nilai.siswa_id','=','siswa.id')->get();
    return view('nilai.index',[
        'dataNilai'=>$dataNilai
    
    ]);
  }
//tambah nilai
  public function tambah(){
    $dataSiswa = Murid::get();
    return view('nilai.tambah',[
        'dataSiswa'=>$dataSiswa
    ]);
  }
  //aksi tambah nilai
  public function aksi_tambah_nilai(Request $request){
    //validasi untuk tambah nilai
    $request->validate([
      'siswa_id'=> 'required',
      'nilai'=> 'required | numeric'
    ],[
      'siswa_id.required'=>'Siswa wajib diisi, tapi tetap yang wajib itu adalah sholat 5 waktu',
      'nilai.required'=>'nilai wajib diisi, tapi tetap yang wajib itu adalah sholat 5 waktu'
    ]);

    if($request -> nilai>100 || $request ->nilai < 0){
      return redirect()->back()->with([
        'validasi_nilai'=>'Nilai tidak boleh kurang dari 0 dan tidak boleh lebih dari 100'
      ]);
    }
    Nilai::insert([
        'siswa_id'=>$request->siswa_id,
        'nilai'=>$request->nilai
    ]);
    return redirect()->route('nilai')->with('pesan','Pesan berhasil ditambahkan');
  }

  //hapus
  public function hapus($id){
    Nilai::where('id',$id)->delete();
    return redirect()->route('nilai')->with('hapus','Data telah dihapus');
  }


  //edit
  public function edit($id){
   

    $dataNilai = Nilai::where('id',$id)->first();
    $dataSiswa = Murid::get();
    return view('nilai.edit',[
      'dataSiswa' => $dataSiswa,
      'nilai' => $dataNilai
    ]);
  }
  public function aksi_edit_nilai(Request $request , $id){
    $request->validate([
      'siswa_id'=>'required',
      'nilai'=>'required | numeric'
    ],[
      'siswa_id.required'=>'Siswa wajib diisBi, tapi tetap yang wajib itu adalah sholat 5 waktu',
      'nilai.required'=>'nilai wajib diisi, tapi tetap yang wajib itu adalah sholat 5 waktu'
    ]);

    if($request -> nilai>100 || $request ->nilai < 0){
      return redirect()->back()->with([
        'validasi_nilai'=>'Nilai tidak boleh kurang dari 0 dan tidak boleh lebih dari 100'
      ]);
      }


    Nilai::where('id',$id)->update([
      'siswa_id'=> $request -> siswa_id,
      'nilai'=> $request -> nilai
    ]);
    return redirect()->route('nilai')->
    with('edit_nilai','Data berhasil di edit');
  }
  
}
