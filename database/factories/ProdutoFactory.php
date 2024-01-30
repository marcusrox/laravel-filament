<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(asText: true);
        $preco = rand(50, 1000);
        return [
            'nome' => $name,
            'nome_curto' => $name,
            'codigo' => Str::slug($name),
            'ncm' => Str::slug($name),
            'slug' => Str::slug($name),

            'preco_custo' => $preco - 40,
            'preco_venda' => $preco,
            'preco_venda_min' => $preco - 10,
            'qtd_estoque' => rand(0, 100),
            'qtd_estoque_min' => rand(0, 10),
            'descricao_detalhada' => fake()->sentence(),
        ];
    }
}
