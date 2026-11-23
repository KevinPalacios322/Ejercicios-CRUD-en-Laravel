<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_log_in(): void
    {
        User::create([
            'usuario' => 'admin',
            'password' => Hash::make('12345678'),
        ]);

        $response = $this->post(route('login.store'), [
            'usuario' => 'admin',
            'password' => '12345678',
        ]);

        $response->assertRedirect(route('veterinaria.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_guest_is_redirected_from_dashboard(): void
    {
        $this->get(route('veterinaria.dashboard'))
            ->assertRedirect(route('login'));
    }
}
