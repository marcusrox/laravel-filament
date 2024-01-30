<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cidade::create([
            'nome' => 'Salvador',
            'uf_id' => 5,
        ]);
        Cidade::create([
            'nome' => 'Jequié',
            'uf_id' => 5,
        ]);
        Cidade::create([
            'nome' => 'Aracaju',
            'uf_id' => 25,
        ]);
        Cidade::create([
            'nome' => 'São Paulo',
            'uf_id' => 24,
        ]);
    }
}
