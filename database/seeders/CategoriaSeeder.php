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
            'nome' => 'Categoria 01',
            'slug' => 'categoria-01',
        ]);
        Categoria::create([
            'nome' => 'Categoria 02',
            'slug' => 'categoria-02',
        ]);
    }
}
