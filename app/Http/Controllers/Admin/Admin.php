<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class Admin extends Controller
{

    public function Login(Request $req)
    {

        $credentials = $request->only('email', 'password');

        try {

            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {

            return response()->json(['error' => 'could_not_create_token'], 500);
        }


        return response()->json(compact('token'));

    }
}
