<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class UserController extends Controller
{
    //
    public function login(LoginRequest $request) {
        $request->validated();

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
                'status' => true,
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
       
    }

    public function register(Request $request) {
        $existingUser = User::where('email', $request['email'])->first();

        if($existingUser) {
            return response()->json([
                'status' => false,
                'message' => 'Email already exists.'
            ]);
        }
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => $request->isAdmin
        ]);

        try{
            // Send the email
            Mail::to($request->email)->send(new WelcomeEmail([
                'name' => $request->name,
            ]));
            // print_r(error_get_last());
            return response()->json(['message' => 'Email sent successfully']);
        }            
        catch(\Exception $e) {
            return response()->json(['error' => 'Email could not be sent.Please try again.']);
        }
            
    }

}
