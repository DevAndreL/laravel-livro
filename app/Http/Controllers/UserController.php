<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user(Request $request) {
        $credencials = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $credencials['name'],
            'email' => $credencials['email'],
            'password' => Hash::make($credencials['password'])
        ]);

        //$token = $user->createToken($request->email)->plainTextToken;

        $response = [
            'user' => $user,
            //'token' => $token
        ];

        return response($response, 201);
    }

    function login( Request $request )
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                "message" => "Login inválido"
            ], 404);
        }

        $token = $user->createToken($user->email)->plainTextToken;

        $response = [
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
   }

}
