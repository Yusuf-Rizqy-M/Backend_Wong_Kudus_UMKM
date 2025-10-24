<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
            User::create([
            'name' => 'Admin UMKM Kudus',
            'email' => 'umkmkudus@gmail.com',
            'password' => Hash::make('adminumkm2025'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
