<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
            
          
        }
        return response()->json([
            "message" => "Invalid User"
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([    
            "email" => "required|string|email|unique:users",
            "name" => "required|string",
            "password" => "required|string|min:4"
        ]);
    
        $user = User::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => Hash::make($request->password)
        ]);
     
        return response()->json([
            "message" => "Sucess",
            "user" => $user
        ]);
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
            return response()->json([
                'message' => 'Logout completed successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'No authenticated users'
            ], 401);
        }
    }

    
}