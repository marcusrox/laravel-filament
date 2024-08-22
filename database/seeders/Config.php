<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::create([
            'key' => 'venda.pct_vpc_default',
            'value' => '0',
            'description' => '% padrão do VPN na venda'
        ]);
        Config::create([
            'key' => 'venda.pct_comissao_default',
            'value' => '3',
            'description' => '% padrão da comissão na venda'
        ]);
    }
}
