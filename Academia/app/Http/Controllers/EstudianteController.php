<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;


class EstudianteController extends Controller
{

    public function index()
    {

        $estudiantes = Estudiante::all();
        return view('estudiante.estudiante', ['estudiantes' => $estudiantes]);
    }

    public function create()
    {
        return view('estudiante.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'numero_cuenta' => 'required|unique:estudiantes',
            'nombre' => 'required',
            'correo' => 'required|email|unique:estudiantes',
            'fecha_nacimiento' => 'required|date',
        ]);

        $estudiante = new Estudiante();
        $estudiante->numero_cuenta = $request->input('numero_cuenta');
        $estudiante->nombre = $request->input('nombre');
        $estudiante->correo = $request->input('correo');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->save();    

    

        return redirect()->route('estudiante.index')->with('success', 'Estudiante creado exitosamente.');
    }

}
