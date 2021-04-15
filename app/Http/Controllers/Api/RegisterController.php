<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        //dd('register');
       $usercreate = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password)
       ]);

       return response()->json([
           'code' => 201,
           'data' => $usercreate,
       ], 201);
    }
}
