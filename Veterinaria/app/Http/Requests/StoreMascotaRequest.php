<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMascotaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'codigo' => ['bail', 'required', 'string', 'max:255', 'unique:mascotas,codigo'],
            'nombre' => ['bail', 'required', 'string', 'max:80'],
            'especie' => ['bail', 'required', 'in:perro,gato,otro'],
            'propietario' => ['bail', 'required', 'string', 'max:100'],
            'fecha_nacimiento' => ['bail', 'required', 'date', 'before_or_equal:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser texto válido.',
            'max' => 'El campo :attribute no debe tener más de :max caracteres.',
            'unique' => 'El código ya ha sido registrado.',
            'in' => 'Seleccione una especie válida.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'before_or_equal' => 'La fecha de nacimiento no puede ser futura.',
        ];
    }

    public function attributes(): array
    {
        return [
            'codigo' => 'código',
            'nombre' => 'nombre',
            'especie' => 'especie',
            'propietario' => 'propietario',
            'fecha_nacimiento' => 'fecha de nacimiento',
        ];
    }
}
