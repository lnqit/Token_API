<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SessionUser;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        //dd(123);
        $dataCheckLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( auth()->attempt($dataCheckLogin))
        {
            //dd(123);
            $checkTokenExit = SessionUser::where('user_id', auth()->id())->first();
            if(empty($checkTokenExit)){
                $userSession = SessionUser::create([
                    'Token' => Str::random(40),
                    'refresh_token' => Str::random(40),
                    'Token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                    'Refresh_Token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
                    'user_id' => auth()->id()
                ]);
            }else{
                $userSession = $checkTokenExit;
            }
        }
        return response()->json([
            'code' => 200,
            'data' => $userSession
        ], 200);
    }
}
