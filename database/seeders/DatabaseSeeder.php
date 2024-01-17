<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Marcus Moreira',
            'email' => 'marcus@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Suporte iDev',
            'email' => 'suporte@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Customer::factory(10)->create();
        \App\Models\Patient::factory(20)->create();

    }
}
