<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function logintoapp(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Check if the username exists
        $username = DB::table("fmsappuser")->where("username", $request->username)->first();
    
        if ($username) {
            // Check if the password matches
            $user = DB::table("fmsappuser")
                ->where("username", $request->username)
                ->where("password", $request->password)
                ->first();
    
            if ($user) {
                // Successful login response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successful',
                    
                ], 200);
            } else {
                // Incorrect password
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid password',
                ], 401);
            }
        } else {
            // Username not found
            return response()->json([
                'status' => 'error',
                'message' => 'Username not found',
            ], 404);
        }
    }
    
}
