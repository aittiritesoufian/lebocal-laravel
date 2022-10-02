<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@websociety.fr',
            'isAdmin' => true,
            'password' => Hash::make('monmotdepasse')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Visitor User',
            'email' => 'visitor@websociety.fr',
            'isAdmin' => false,
            'password' => Hash::make('monmotdepasse')
        ]);
    }
}
