<?php

namespace App\Http\Controllers;
use App\Models\StudentModel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student(){
        $data = StudentModel::all();
        return view('student', ['data'=>$data]);
    }
   public function addstudent(Request $request){
        $data = new StudentModel();
        $data->studentNumber = $request->stud_no;
        $data->studentName = $request->stud_name;
        $data->student_year_course = $request->stud_yr_course;
        $data->save();

        return redirect()->back()->with(['data'=>$data]);
    }
    
}
