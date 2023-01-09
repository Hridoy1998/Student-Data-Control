<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function GoLogin(){
        return view('login');
    }
    public function Login(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if('admin@gmail.com'==$req->email && '1234'==$req->password)
        {
            return view('student.studentAdd');
        }
        else
        {
            return back()->with('fail', 'Email or Password incorrect');
        }
    }
}
