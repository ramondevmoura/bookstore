<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SanctumSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Ramon Felipe',
            'email' => 'ramonmoura2012@gmail.com.br',
            'password' => Hash::make('password'),
        ])->createToken('Admin Token')->plainTextToken;
    }
}