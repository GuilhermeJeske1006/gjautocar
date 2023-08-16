<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'logo' => $this->faker->imageUrl(),
            'email' => $this->faker->unique()->safeEmail,
            'whatsapp' => $this->faker->phoneNumber,
            'instagram' => $this->faker->userName,
            'facebook' => $this->faker->url,
            'telefone' => 1121312,
            'cor' => $this->faker->colorName,
            'descricao' => $this->faker->text,
            'palavras_chaves' => $this->faker->words(3, true),
            'titulo' => $this->faker->sentence,
            'endereco_id' => 1,
        ];
    }
}
