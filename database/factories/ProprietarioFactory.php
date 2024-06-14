<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proprietario>
 */
class ProprietarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => ake()->name(),
            'email' => fake()->unique()->safeEmail(),
            "phone" => "",
            "fracao" => "",
            "divida" => 0.0,
            "divida_atual" => 0.0,
            "permilagem" => 0.0
        ];
    }
}
