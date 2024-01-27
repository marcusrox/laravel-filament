<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'razao_social' => fake()->name(),
            'tipo_pessoa' => fake()->randomElement(['F', 'J']),
            'cpf_cnpj' => fake()->unique()->numberBetween('11111111111', '21111111111'),

            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'vendedor_id' => 1,
        ];
    }
}
