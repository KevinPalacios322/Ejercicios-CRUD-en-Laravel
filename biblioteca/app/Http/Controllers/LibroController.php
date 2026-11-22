<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::orderBy('id')->get();

        return view('libros.libros', ['libros' => $libros]);
    }

    public function create()
    {
        return view('libros.crear_libro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:libros,codigo',
            'titulo' => 'required',
            'autor' => 'required',
            'anio_publicacion' => 'required|integer',
        ]);

        $libro = new Libro();
        $libro->codigo = $request->input('codigo');
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->anio_publicacion = $request->input('anio_publicacion');
        $libro->save();

        return redirect()->route('libros.libros')->with('success', 'Libro creado exitosamente.');
    }
}
