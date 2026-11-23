<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrNew(['usuario' => 'admin']);
        $admin->usuario = 'admin';
        $admin->password = Hash::make('12345678');
        $admin->save();
    }
}
