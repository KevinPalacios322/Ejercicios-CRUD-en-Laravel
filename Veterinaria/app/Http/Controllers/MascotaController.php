<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Models\Mascota;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MascotaController extends Controller
{
    public function index(): View
    {
        return view('mascotas.index', [
            'mascotas' => Mascota::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('mascotas.create');
    }

    public function store(StoreMascotaRequest $request): RedirectResponse
    {
        Mascota::create($request->validated());

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota registrada correctamente.');
    }
}
