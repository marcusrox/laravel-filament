<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            CategoriaSeeder::class,
            UfSeeder::class,
            CidadeSeeder::class,
            VendedorSeeder::class,
            FornecedorSeeder::class,
            CentroCustoSeeder::class,
            ContaPagarSeeder::class,
            ContaReceberSeeder::class,
            FaturamentoSeeder::class,
            VendaSituacaoSeeder::class,
            TransportadoraSeeder::class,
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Cliente::factory(10)->create();
        \App\Models\Produto::factory(20)->create();
    }
}
