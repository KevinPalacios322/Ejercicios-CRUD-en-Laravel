<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mascota>
 */
class MascotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => 'MAS-'.fake()->unique()->numerify('#####'),
            'nombre' => fake()->firstName(),
            'especie' => fake()->randomElement(['perro', 'gato', 'otro']),
            'propietario' => fake()->name(),
            'fecha_nacimiento' => fake()->dateTimeBetween('-15 years', 'now')->format('Y-m-d'),
        ];
    }
}
