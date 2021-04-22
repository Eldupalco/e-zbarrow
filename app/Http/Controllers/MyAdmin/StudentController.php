<?php

namespace App\Http\Controllers\MyAdmin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function indexStudent(Request $request) {
        $student = Student::all();
        return view('admin.student')->with('student',$student);
    }

    public function saveStudent(Request $request){

        $student =new Student();
        $student->student_id = $request->input('student_id');
        $student->last_name = $request->input('last_name');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');
        $student->section = $request->input('section');
        $student->year_level = $request->input('year_level');
        $student->department = $request->input('department');
    
        $student->save();
        return redirect('/student');
    
       }

       public function editStudent($id){

        $student = Student::findOrFail($id);
         return view('admin.student.edit_student')->with('student',$student);
     
        }

       public function updateStudent(Request $request, $id){

        $student = Student::findOrFail($id);
        $student->student_id = $request->input('student_id');
        $student->last_name = $request->input('last_name');
        $student->first_name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->gender = $request->input('gender');
        $student->address = $request->input('address');
        $student->section = $request->input('section');
        $student->year_level = $request->input('year_level');
        $student->department = $request->input('department');
    
        $student->update();
        return redirect('student');
    
       }

       public function deleteStudent($id){
    
        $student = Student::findOrFail($id);
        $student->delete();
     
        return redirect('student');
    
       }

}
