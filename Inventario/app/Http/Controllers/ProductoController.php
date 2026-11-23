<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        return view('producto.producto', compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $producto = $request->validate([
            'codigo' => 'required|string|max:255|unique:productos,codigo',
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric|min:0',
            'existencia' => 'required|integer|min:0',
        ]);

        Producto::create($producto);

        return redirect()->route('producto')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('producto.update', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validatedData = $request->validate([
            'codigo' => 'required|string|max:255|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric|min:0',
            'existencia' => 'required|integer|min:0',
        ]);

        $producto->update($validatedData);

        return redirect()->route('producto')->with('success', 'Producto actualizado exitosamente.');
    }
}
