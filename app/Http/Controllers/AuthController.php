<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'remember' => 'boolean',
        ]);

        $remember = $data['remember']  ?? false;
        unset($data['remember']);
        if(!Auth::attempt($data, $remember)){
            return response([
                'message' => 'Email or Password is incorrect'
            ], 422);
        }

        $user = Auth::user();
        if(!$user->is_admin){
            Auth::logout();
            
            return response([
                'message' => 'You dont have permission to enter as admin', 403
            ]);
        }

        $token = $user->createToken('main')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(){
        $user = Auth::user();
        $user = currentAccessToken()->delete();

        return response('', 204);
    }
}
