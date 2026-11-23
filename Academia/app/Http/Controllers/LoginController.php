<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');

        if (auth()->attempt($credentials)) {
            
            return redirect()->intended('estudiante/estudiante');
        }

        return back()->withErrors([
            'usuario' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
