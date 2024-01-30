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
        Uf::create(['nome' => 'Acre', 'sigla' => 'AC']);
        Uf::create(['nome' => 'Alagoas', 'sigla' => 'AL']);
        Uf::create(['nome' => 'Amapá', 'sigla' => 'AP']);
        Uf::create(['nome' => 'Amazonas', 'sigla' => 'AM']);
        Uf::create(['nome' => 'Bahia', 'sigla' => 'BA']);
        Uf::create(['nome' => 'Ceará', 'sigla' => 'CE']);
        Uf::create(['nome' => 'Espírito Santo', 'sigla' => 'ES']);
        Uf::create(['nome' => 'Goiás', 'sigla' => 'GO']);
        Uf::create(['nome' => 'Maranhão', 'sigla' => 'MA']);
        Uf::create(['nome' => 'Mato Grosso', 'sigla' => 'MT']);
        Uf::create(['nome' => 'Mato Grosso do Sul', 'sigla' => 'MS']);
        Uf::create(['nome' => 'Minas Gerais', 'sigla' => 'MG']);
        Uf::create(['nome' => 'Pará', 'sigla' => 'PA']);
        Uf::create(['nome' => 'Paraíba', 'sigla' => 'PB']);
        Uf::create(['nome' => 'Paraná', 'sigla' => 'PR']);
        Uf::create(['nome' => 'Pernambuco', 'sigla' => 'PE']);
        Uf::create(['nome' => 'Piauí', 'sigla' => 'PI']);
        Uf::create(['nome' => 'Rio de Janeiro', 'sigla' => 'RJ']);
        Uf::create(['nome' => 'Rio Grande do Norte', 'sigla' => 'RN']);
        Uf::create(['nome' => 'Rio Grande do Sul', 'sigla' => 'RS']);
        Uf::create(['nome' => 'Rondônia', 'sigla' => 'RO']);
        Uf::create(['nome' => 'Roraima', 'sigla' => 'RR']);
        Uf::create(['nome' => 'Santa Catarina', 'sigla' => 'SC']);
        Uf::create(['nome' => 'São Paulo', 'sigla' => 'SP']);
        Uf::create(['nome' => 'Sergipe', 'sigla' => 'SE']);
        Uf::create(['nome' => 'Tocantins', 'sigla' => 'TO']);
        Uf::create(['nome' => 'Distrito Federal', 'sigla' => 'DF']);
    }
}
