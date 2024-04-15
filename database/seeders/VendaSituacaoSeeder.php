<?php

namespace Database\Seeders;

use App\Models\VendaSituacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaSituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VendaSituacao::create(['nome' => 'Aguardando Autorização']);
        VendaSituacao::create(['nome' => 'Aguardando Faturamento']);
        VendaSituacao::create(['nome' => 'Cancelado']);
        VendaSituacao::create(['nome' => 'Faturado']);
        VendaSituacao::create(['nome' => 'Faturado Parcialmente']);
        //VendaSituacao::create(['nome' => 'Aguardando Autorização (Mix)']);
        //VendaSituacao::create(['nome' => 'Aguardando Autorização (Inadimplência)']);
        //VendaSituacao::create(['nome' => 'Aguardando Autorização (Bônus)']);
    }
}
