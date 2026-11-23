<?php

namespace App\Models;

use Database\Factories\MascotaFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

#[Fillable(['codigo', 'nombre', 'especie', 'propietario', 'fecha_nacimiento'])]
class Mascota extends Model
{
    /** @use HasFactory<MascotaFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::saving(function (Mascota $mascota): void {
            Validator::make($mascota->getAttributes(), [
                'codigo' => [
                    'required',
                    'string',
                    Rule::unique('mascotas', 'codigo')->ignore($mascota),
                ],
                'nombre' => ['required', 'string', 'max:80'],
                'especie' => ['required', Rule::in(['perro', 'gato', 'otro'])],
                'propietario' => ['required', 'string', 'max:100'],
                'fecha_nacimiento' => ['required', 'date', 'before_or_equal:today'],
            ])->validate();
        });
    }

    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
        ];
    }
}
