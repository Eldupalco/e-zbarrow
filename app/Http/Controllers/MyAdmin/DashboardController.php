<?php

namespace App\Http\Controllers\MyAdmin;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
   public function registered()
   {

        $users = User::all();
        return view ('admin.user.account')->with('users',$users);
   }

   public function registerEdit(Request $request, $id)
   {
      $users = User::findOrFail($id);
      return view('admin.register-edit')->with('users',$users);
   }

  

   public function createAccount(Request $request, $id)
   {
      $student = Student::findOrFail($id);
      return view('admin.user.create_account')->with('student',$student);
   }

   public function registerUpdate(Request $request, $id)
   {
      $users = User::find($id);
      $users->name = $request->input('name');
      $users->userType = $request->input('userType');
      $users->update();

      return redirect('/register-roles')->with('Success','Your data is successfully Updated!');
      
   }

   public function registerDelete(Request $request, $id)
   {
      $users = User::findOrFail($id);
      $users->delete();

      return redirect('/register-roles')->with('Success','Your data is successfully Deleted!');
      
   }
}

