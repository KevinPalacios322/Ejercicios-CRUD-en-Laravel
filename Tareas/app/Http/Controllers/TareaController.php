<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::orderBy('id')->get();

        return view('tareas', compact('tareas'));
    }

    public function create()
    {
        return view('tareas-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => ['required', 'string', 'max:150'],
            'descripcion' => ['required', 'string', 'max:500'],
            'responsable' => ['required', 'string', 'max:100'],
            'fecha_limite' => ['required', 'date'],
            'estado' => ['required', Rule::in(['pendiente', 'en proceso', 'completada'])],
        ]);

        Tarea::create($validated);

        return redirect()->route('tareas')->with('success', 'Tarea creada exitosamente.');
    }
}
