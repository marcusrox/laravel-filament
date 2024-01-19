<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(asText: true);
        return [
            'name' => $name,
            'description' => fake()->sentence(),
            'price' => rand(10, 1000),
            'quantity' => rand(0, 100),
            'slug' => Str::slug($name),
        ];
    }
}
