<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Automovel>
 */
class AutomovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'foto_capa' => '',
            'nome' => $this->faker->name,
            'ano' => '2020',
            'quilometragem' => 100,
            'valor' => 10000,
            'cambio' => 'manual',
            'tipo_combustivel' => 'flex',
            'cor' => 'preto',
            'qtd_portas' => 4,
            'categoria_id' => 1,
            'final_placa' => 1,
            'observacao' => $this->faker->text,
            'tipo_automovel_id' => 1,
            'categoria_id' => 1,
            'empresa_id' => 1,
        ];
    }
}
