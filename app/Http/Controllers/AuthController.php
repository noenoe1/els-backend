<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return inertia('user/Login');
    }

    public function showRegister()
    {
        return inertia('user/Register');
    }

    public function login(LoginRequest $request) {
        $request->validated();

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token) {
            
            return redirect()->route('auth.login');
        }

        $request->session()->put('current_user',Auth::user());
        
        return Redirect::route('home');
        
    }

    public function register(Request $request)
    {
        $existingUser = User::where('email', $request['email'])->first();

        if($existingUser) {
            throw new \Exception('Email already exists.');
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
     
        return redirect()->route('auth.login');  
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return Redirect::route('auth.login');
       
    }
}