<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin iDev',
            'email' => 'admin@idevs.com.br',
            'password' => '12345678',
            'email_verified_at' => Carbon::now(),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ])->roles()->attach(Role::whereName('Admin')->first());

        User::create([
            'name' => 'Financeiro iDev',
            'email' => 'financeiro@idevs.com.br',
            'password' => '12345678',
            'email_verified_at' => Carbon::now(),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ])->roles()->attach(Role::whereName('Financeiro')->first());

        User::create([
            'name' => 'Vendedor 1',
            'email' => 'vendedor1@idevs.com.br',
            'password' => '12345678',
            'email_verified_at' => Carbon::now(),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ])->roles()->attach(Role::whereName('Vendedor')->first());

        User::create([
            'name' => 'Vendedor 2',
            'email' => 'vendedor2@idevs.com.br',
            'password' => '12345678',
            'email_verified_at' => Carbon::now(),
            'active' => true,
            'avatar_url' => 'https://i.pravatar.cc/300?img=' . fake()->numberBetween(1, 70),
        ])->roles()->attach(Role::whereName('Vendedor')->first());
    }
}
