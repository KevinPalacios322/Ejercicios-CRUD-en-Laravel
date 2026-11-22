<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
   
    public function run(): void
    {
        
        $admin = User::firstOrNew(['usuario' => 'admin']);
        $admin -> usuario = 'admin';
        $admin -> password = Hash::make('1');
        $admin -> save();

    }
}
