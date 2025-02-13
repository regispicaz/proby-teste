<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->text(200),
            'observation' => $this->faker->optional()->text(200),
            'start_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['Pendente', 'Em Andamento', 'Concluído']),
        ];
    }
}
