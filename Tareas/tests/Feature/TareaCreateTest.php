<?php

namespace Tests\Feature;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TareaCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_task_with_past_date(): void
    {
        $admin = User::factory()->create(['usuario' => 'admin']);

        $response = $this->actingAs($admin)->post('/tareas', [
            'titulo' => 'Tarea vencida',
            'descripcion' => 'Descripción válida',
            'responsable' => 'Juan Pérez',
            'fecha_limite' => '2020-01-15 00:00:00',
            'estado' => 'pendiente',
        ]);

        $response->assertRedirect('/tareas');
        $this->assertDatabaseHas('tareas', [
            'titulo' => 'Tarea vencida',
            'responsable' => 'Juan Pérez',
            'fecha_limite' => '2020-01-15 00:00:00',
            'estado' => 'pendiente',
        ]);
    }

    public function test_validation_keeps_input_and_rejects_invalid_estado(): void
    {
        $admin = User::factory()->create(['usuario' => 'admin']);

        $response = $this->actingAs($admin)->from('/tareas/create')->post('/tareas', [
            'titulo' => 'Título conservado',
            'descripcion' => 'Descripción conservada',
            'responsable' => 'Responsable conservado',
            'fecha_limite' => '2020-01-15',
            'estado' => 'cancelada',
        ]);

        $response->assertSessionHasErrors('estado');
        $response->assertSessionHasInput([
            'titulo' => 'Título conservado',
            'descripcion' => 'Descripción conservada',
            'responsable' => 'Responsable conservado',
        ]);
        $this->assertFalse(Tarea::where('titulo', 'Título conservado')->exists());
    }
}
