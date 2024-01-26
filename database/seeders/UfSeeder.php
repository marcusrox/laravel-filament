<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Seeder;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Uf::create([
            'nome' => 'Bahia',
            'sigla' => 'BA',
        ]);
        Uf::create([
            'nome' => 'Sergipe',
            'sigla' => 'SE',
        ]);
        Uf::create([
            'nome' => 'São Paulo',
            'sigla' => 'SP',
        ]);

    }
}
