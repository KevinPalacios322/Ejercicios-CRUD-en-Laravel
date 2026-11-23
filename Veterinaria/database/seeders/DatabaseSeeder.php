<?php

namespace Database\Seeders;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(['usuario' => 'admin'], [
            'password' => Hash::make('12345678'),
        ]);

        if (Mascota::query()->doesntExist()) {
            Mascota::factory()->count(10)->create();
        }
    }
}
