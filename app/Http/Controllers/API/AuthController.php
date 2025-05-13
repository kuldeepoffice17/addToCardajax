<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
class AuthController extends Controller
{
    
    // User Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'token' => $token,
            'user' => $user,
        ]);
    }

     // User Login
     public function login(Request $request)
     {
         $request->validate([
             'email'    => 'required|email',
             'password' => 'required'
         ]);
 
         $user = User::where('email', $request->email)->first();
 
         if (!$user || !Hash::check($request->password, $user->password)) {
             return response()->json([
                 'status' => false,
                 'message' => 'Invalid credentials',
             ], 401);
         }
 
         $token = $user->createToken('auth_token')->plainTextToken;
 
         return response()->json([
             'status' => true,
             'message' => 'Login successful',
             'token' => $token,
             'user' => $user,
         ]);
     }

      // User Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ]);
    }

}
