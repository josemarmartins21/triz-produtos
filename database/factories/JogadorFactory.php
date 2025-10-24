<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->id(),
            'nome' => fake()->nome(),
            'clube' => fake()->clube(),
            'nacionalidade' =>fake()->nacionalidade(),
            'sobre' => fake()->sobre(),
            'numero_de_titulos' => fake()->numero_de_titulos(),
            'foto' => fake()->imageUrl(640, 480)
        ];
    }
}
