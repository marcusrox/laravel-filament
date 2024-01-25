<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'nome' => 'Eletrônicos',
            'slug' => 'eletronicos',
        ]);
        Categoria::create([
            'nome' => 'Climatizadores',
            'slug' => 'climatizadores',
        ]);

    }
}
