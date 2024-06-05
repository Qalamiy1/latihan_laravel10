<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;


class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function aksi_register(Request $request){
        $request->validate([
            'nama'=>'required',
            'email'=>'required|email|unique:pengguna,email',
            'password'=>'required'

        ],[
            'nama.required'=> 'nama harus disi',
            'email.email'=> 'Email tidak terdaftar atau valid',
            'password.required'=> 'password harus diisi',
            'email.required'=> 'email harus diisi'
        ]);
        pengguna::insert([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->back()->with('register','berhasil register');
    }
    public function login(){
        return view('auth.login');
    }
    public function aksi_login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'

        ],[
            'email.email'=> 'Email tidak terdaftar atau valid',
            'password.required'=> 'password harus diisi',
            'email.required'=> 'email harus diisi'
        ]);
        $credentials= $request->only(['email','password']);
    //     ['email '=>$request->email,
    //     'password'=>$request->password
    // ];
    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->route('home');
    }
    return redirect()->back();
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
}
}
