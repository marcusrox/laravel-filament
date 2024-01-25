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

        $admin = \App\Models\Role::factory()->create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        $financeiro = \App\Models\Role::factory()->create([
            'name' => 'Financeiro',
            'guard_name' => 'web',
        ]);
        $representante = \App\Models\Role::factory()->create([
            'name' => 'Representante',
            'guard_name' => 'web',
        ]);

        $u_admin = \App\Models\User::factory()->create([
            'name' => 'Admin iDev',
            'email' => 'suporte@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);
        $u_admin->roles()->attach($admin);

        $u_marcus = \App\Models\User::factory()->create([
            'name' => 'Marcus Moreira de Souza',
            'email' => 'marcus@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);
        $u_marcus->roles()->attach($admin);

        $u_financeiro = \App\Models\User::factory()->create([
            'name' => 'Financeiro iDev',
            'email' => 'financeiro@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);
        $u_financeiro->roles()->attach($financeiro);

        $u_representante = \App\Models\User::factory()->create([
            'name' => 'Representante iDev',
            'email' => 'representante@idevs.com.br',
            'password' => Hash::make('12345678'),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ]);
        $u_representante->roles()->attach($representante);

        \App\Models\User::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Patient::factory(20)->create();
        \App\Models\Produto::factory(20)->create();

        $this->call([
            PermissionSeeder::class,
            CategoriaSeeder::class,
        ]);
    }
}
