<?php

namespace Database\Seeders;

use App\Models\CentroCusto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroCustoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CentroCusto::create(['nome' => 'Despesas', 'codigo' => '01',]);
        CentroCusto::create(['nome' => 'Telefonia', 'codigo' => '01.01',]);
        CentroCusto::create(['nome' => 'Combustível', 'codigo' => '01.02',]);
        CentroCusto::create(['nome' => 'Manunteção predial', 'codigo' => '01.03',]);

        CentroCusto::create(['nome' => 'Investimentos', 'codigo' => '02',]);
        CentroCusto::create(['nome' => 'Mobiliário', 'codigo' => '02.01',]);
        CentroCusto::create(['nome' => 'Ampliação estrutura', 'codigo' => '02.02',]);
        CentroCusto::create(['nome' => 'Aquisição de máquinas', 'codigo' => '02.03',]);
    }
}
