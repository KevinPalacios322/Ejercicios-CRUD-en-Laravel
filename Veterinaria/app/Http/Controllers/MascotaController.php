<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMascotaRequest;
use App\Http\Requests\UpdateMascotaRequest;
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

    public function edit(Mascota $mascota): View
    {
        return view('mascotas.edit', compact('mascota'));
    }

    public function update(UpdateMascotaRequest $request, Mascota $mascota): RedirectResponse
    {
        $mascota->update($request->validated());

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota actualizada correctamente.');
    }
}
