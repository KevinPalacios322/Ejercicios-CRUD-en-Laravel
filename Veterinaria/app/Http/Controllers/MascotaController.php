<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\View\View;

class MascotaController extends Controller
{
    public function index(): View
    {
        return view('mascotas.index', [
            'mascotas' => Mascota::orderBy('id')->get(),
        ]);
    }
}
