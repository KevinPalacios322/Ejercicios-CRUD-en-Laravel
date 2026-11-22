<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    
    public function MostrarLogin()
{
    return view('login');
}

    public function iniciarSesion(Request $request){


        $credenciales = $request->validate([
        'usuario' => ['required','string'],
        'password' => ['required','string'],

        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            return redirect()->intended('/libros/libros');
        }



        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('usuario');
    }

    public function cerrarSesion(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
