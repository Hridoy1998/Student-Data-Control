<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function create(){
        return view('student.studentAdd');
    }
    public function StudentAdd(Request $req){
        $req->validate([
            'StudentName'=>'required|regex:/^[A-Z a-z]+$/',
            'gender'=>'required',
            'dob'=>'required',
            'StudentId'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[0-3]{1}+$/|unique:students',
            'StudentDeperment'=>'required',
            'StudentEmail'=>'required|unique:students'
        ]);
        $student = new Student();
        $student->StudentName=$req->StudentName;
        $student->gender=$req->gender;
        $student->dob=$req->dob;
        $student->StudentId=$req->StudentId;
        $student->StudentDeperment=$req->StudentDeperment;
        $student->StudentEmail=$req->StudentEmail;
        $student->save();
        if($student){
            return back()->with('success','You have Update successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function update(Request $req){
        $student=Student::where('id','=',$req->id)->first();
        return view('student.studentEdit')->with('student',$student);
    }
    public function StudentEdit(Request $req){
        $req->validate([
            'StudentName'=>'required|regex:/^[A-Z a-z]+$/',
            'gender'=>'required',
            'dob'=>'required',
            'StudentId'=>'required|regex:/^[0-9]{2}-[0-9]{5}-[0-3]{1}+$/|unique:students,StudentId,'.$req->id,
            'StudentDeperment'=>'required',
            'StudentEmail'=>'required|unique:students,StudentEmail,'.$req->id
        ]);
        $student =Student::find($req->id);
        $student->StudentName=$req->StudentName;
        $student->gender=$req->gender;
        $student->dob=$req->dob;
        $student->StudentId=$req->StudentId;
        $student->StudentDeperment=$req->StudentDeperment;
        $student->StudentEmail=$req->StudentEmail;
        $student->save();
        if($student){
            return back()->with('success','You have Update successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function delete(Request $req){
    }
    public function view(Request $req){
        $student=Student::where('id','=',$req->id)->first();
        return view('student.studentView')->with('student',$student);
    }
    public function List(){
        $student=Student::all();
        return view('student.studentList')->with('student',$student);
    }
}
