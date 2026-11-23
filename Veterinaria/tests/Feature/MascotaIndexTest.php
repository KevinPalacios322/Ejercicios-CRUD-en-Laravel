<?php

namespace Tests\Feature;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class MascotaIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_all_pet_attributes(): void
    {
        $mascota = Mascota::factory()->create([
            'codigo' => 'MAS-00001',
            'nombre' => 'Luna',
            'especie' => 'gato',
            'propietario' => 'Ana Pérez',
            'fecha_nacimiento' => '2020-06-15',
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('mascotas.index'))
            ->assertOk()
            ->assertSee($mascota->codigo)
            ->assertSee($mascota->nombre)
            ->assertSee($mascota->especie)
            ->assertSee($mascota->propietario)
            ->assertSee('15/06/2020');
    }

    public function test_factory_creates_only_allowed_species(): void
    {
        $mascotas = Mascota::factory()->count(10)->create();

        $this->assertCount(10, $mascotas);
        $this->assertTrue($mascotas->every(
            fn (Mascota $mascota): bool => in_array($mascota->especie, ['perro', 'gato', 'otro'], true)
        ));
    }

    public function test_authenticated_user_can_register_a_pet(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->post(route('mascotas.store'), [
                'codigo' => 'MAS-90001',
                'nombre' => 'Toby',
                'especie' => 'perro',
                'propietario' => 'María López',
                'fecha_nacimiento' => '2021-05-10',
            ]);

        $response->assertRedirect(route('mascotas.index'));
        $this->assertDatabaseHas('mascotas', [
            'codigo' => 'MAS-90001',
            'propietario' => 'María López',
        ]);
    }

    public function test_pet_registration_rejects_invalid_species_and_future_birth_date(): void
    {
        $response = $this->actingAs(User::factory()->create())
            ->from(route('mascotas.create'))
            ->post(route('mascotas.store'), [
                'codigo' => 'MAS-90002',
                'nombre' => 'Nala',
                'especie' => 'pez',
                'propietario' => 'Carlos Ruiz',
                'fecha_nacimiento' => now()->addDay()->toDateString(),
            ]);

        $response->assertRedirect(route('mascotas.create'));
        $response->assertSessionHasErrors(['especie', 'fecha_nacimiento']);
        $this->assertDatabaseMissing('mascotas', ['codigo' => 'MAS-90002']);
    }

    public function test_pet_cannot_be_saved_with_invalid_data(): void
    {
        $this->expectException(ValidationException::class);

        Mascota::factory()->create([
            'especie' => 'pez',
            'fecha_nacimiento' => now()->addDay()->toDateString(),
        ]);
    }
}
