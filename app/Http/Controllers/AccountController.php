<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function store(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11', 'min:11'],
            'userType' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_id' => ['required', 'string', 'max:20', 'min:4'],
        ]);
         User::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'userType' => $request['userType'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_id' => $request['user_id'],
        ]);
        return redirect('/student');
    }
}
