<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate login credentials
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        // check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'message' => 'Please fix the errors',
                'status' => 'error'
            ], 422);
        }

        // if validation passed gather login credentials
        $credentials = $request->only('email', 'password');

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'data' => null,
                'message' => 'Invalid login details',
                'status' => 'error',
            ], 422);
        }

        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'data' => [
                'token' => $token,
                'user' => Auth::user(),
            ],
            'message' => 'Login Successful',
            'status' => 'success'
        ]);
    }
}
