<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
        $admin=Admin::where('AdminEmail','=',$req->email)->first();
        if($admin){
            if($admin->Password == $req->password)
                {
                    $req->session()->put('Admin', $admin->id);
                    return view('student.studentAdd');
                }
            else
                {
                    return back()->with('fail', 'Email or Password incorrect');
                }
            }
        else{
            return back()->with('fail', 'Email is not register');
        }
    }
    public function GoRegistration(){
        return view('reg');
    }
    public function Registration(Request $req){
        $req->validate([
            'AdminName'=>'required|regex:/^[A-Z a-z]+$/',
            'gender'=>'required',
            'dob'=>'required',
            'UserName'=>'required|min:5|max:8|unique:admins,UserName,'.$req->id,
            'Password'=>'required|min:5|max:8',
            'AdminEmail'=>'required|unique:admins,AdminEmail,'.$req->id
        ]);
        $admin = new Admin();
        $admin->AdminName=$req->AdminName;
        $admin->gender=$req->gender;
        $admin->dob=$req->dob;
        $admin->UserName=$req->UserName;
        $admin->Password=$req->Password;
        $admin->AdminEmail=$req->AdminEmail;
        if($req->pp==null)
          {
            $admin->pp= "user.png";

          }
          else
          {
            $file_name = time().".".$req->file('pp')->getClientOriginalExtension();
            $req->file('pp')->move(public_path('pp'),$file_name);
            $admin->pp = $file_name;
          }
        $admin->save();
        if($admin){
            return back()->with('success','You have Update successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
        return view('reg');
    }

    public function profile(Request $req){
        $n= $req->session()->get('Admin');
        $Admin=Admin::Where('id','=',$n)->first();
        return view('Profile')->with("Admin",$Admin);
    }
}
