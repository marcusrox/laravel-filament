<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendedor::create([
            'nome' => 'Vendedor 1',
            'user_id' => User::whereName('Vendedor 1')->first()->id,
        ]);
        Vendedor::create([
            'nome' => 'Vendedor 2',
            'user_id' => User::whereName('Vendedor 2')->first()->id,
        ]);
    }
}
