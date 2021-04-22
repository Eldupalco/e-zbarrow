<?php

namespace App\Http\Controllers\MyAdmin;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    public function indexFaculty(Request $request) {
        $faculty = Faculty::all();
        return view('admin.faculty')->with('faculty',$faculty);
    }


    public function saveFaculty(Request $request){

        $faculty =new Faculty();
        $faculty->faculty_id = $request->input('faculty_id');
        $faculty->last_name = $request->input('last_name');
        $faculty->first_name = $request->input('first_name');
        $faculty->middle_name = $request->input('middle_name');
        $faculty->department = $request->input('department');
    
        $faculty->save();
        return redirect('/faculty');
    
       }


       public function editFaculty($id){

       $faculty = Faculty::findOrFail($id);
        return view('admin.faculty.edit_faculty')->with('faculty',$faculty);
    
       }
    
       public function updateFaculty(Request $request, $id){

        $faculty = Faculty::findOrFail($id);
        $faculty->faculty_id = $request->input('faculty_id');
        $faculty->last_name = $request->input('last_name');
        $faculty->first_name = $request->input('first_name');
        $faculty->middle_name = $request->input('middle_name');
        $faculty->department = $request->input('department');
    
        $faculty->update();
        return redirect('faculty');
    
       }
    
       public function deleteFaculty($id){
    
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
     
        return redirect('faculty');
    
       }






}
