<?php

namespace Database\Factories;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ClienteFactory extends Factory
{

    protected static ?array $arr_vendedores;

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arr = static::$arr_vendedores ??= Vendedor::pluck('id')->toArray();
        return [
            'nome' => fake()->name(),
            'razao_social' => fake()->name(),
            'tipo_pessoa' => fake()->randomElement(['F', 'J']),
            'cpf_cnpj' => fake()->unique()->cpf(),

            'email' => fake()->unique()->safeEmail(),
            'telefone' => fake()->phoneNumber(),
            'vendedor_id' => fake()->randomElement($arr),
        ];
    }
}
