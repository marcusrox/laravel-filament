<?php

namespace Database\Seeders;

use App\Models\Banco;
use App\Models\ContaCorrente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaCorrenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContaCorrente::create([
            'nome' => 'Conta Santander PJ',
            'banco_id' => Banco::whereCodigo('33')->first()->id,
            'numero_agencia' => 9999,
            'dv_agencia' => 9,
            'numero_conta' => 9999999,
            'dv_conta' => 9,
        ]);
    }
}
