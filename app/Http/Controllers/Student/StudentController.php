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
        $student=Student::where('id','=',$req->id)->first();
        $student->delete();
        if($student){
            return back()->with('success','delete successfully');
        }else{
            return back()->with('fail', 'Something Went Wrong');
        }
    }
    public function view(Request $req){
        $student=Student::where('id','=',$req->id)->first();
        return view('student.studentView')->with('student',$student);
    }
    public function List(){
        $student=Student::all();
        return view('student.studentList')->with('student',$student);
    }
    public function GoSearch(){
        return view('student.StudentSearch');
    }
    public function search(Request $req)
    {

        if($req->ajax()){
            $output='';
        $student=Student::where('StudentId','LIKE','%'.$req->search.'%')
            ->orwhere('StudentDeperment','LIKE','%'.$req->search.'%')
            ->orwhere('StudentName','LIKE','%'.$req->search.'%')->get();
        if($student){
            foreach($student as $student){
                $output.='
                <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Date of birth</th>
                    <th scope="col">Student Email</th>
                    <th scope="col">Deperment</th>
                    <th scope="col">Student ID</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">'.$student->StudentName.'</th>
                    <td>'.$student->gender.'</td>
                    <td>'.$student->dob.'</td>
                    <th scope="row">'.$student->StudentEmail.'</th>
                    <td>'.$student->StudentDeperment.'</td>
                    <td>'.$student->StudentId.'</td>
                  </tr>
                </tbody>
              </table>

                ';
            }
            return response()->json($output);
        }
        // else{
        //     return response()->json([
        //         'status'=>'nothing found'
        //     ]);
        // }
    }
    return view('student.studentList');
    }
}
