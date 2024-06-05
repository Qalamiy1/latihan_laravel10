<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile.index');
    }
    public function aksi_edit_profile(Request $request){
        
        $request->validate([
            'nama'=>'required'
        ],[
        'nama'=>'nama harus diisi'
        ]);
        pengguna::where('id',auth()->user()->id)->
        update([
            'nama'=>$request->nama
        ]);
        return redirect()->back();
    }
}
