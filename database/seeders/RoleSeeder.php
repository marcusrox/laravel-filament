<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'Financeiro',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'Vendedor',
            'guard_name' => 'web',
        ]);
    }
}
