<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(request $request)
    {

        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('usuario', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/producto');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
