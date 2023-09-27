<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->name,
            'subtitulo' => $this->faker->name,
            'texto' => $this->faker->text,
            'foto' => $this->faker->imageUrl(),
            'empresa_id' => 1,

        ];
    }
}
