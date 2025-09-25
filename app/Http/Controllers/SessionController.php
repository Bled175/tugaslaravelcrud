<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('/sesi/index');
    }
    public function login(Request $request){
        Session::flash('email',$request->email);



        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);
        [
            'email'=> 'Email harap diisi',
            'passsword'=> 'Password harap diisi',
        ];
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if (Auth::attempt($infologin)){
            return redirect('departemen')->with('succes','Login berhasil');
        } else{
            return redirect('sesi')->with('error','email dan password tidak valid');
        }
    }
    public function logout(){
        auth::logout();
        return redirect('sesi')->with('succes','Logout berhasil');
    }
}