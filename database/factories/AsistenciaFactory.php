<?php

namespace Database\Factories;

use App\Models\Matricula;
use App\Models\Opcion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asistencia>
 */
class AsistenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => fake()->date(),
            'matricula_id' => Matricula::inRandomOrder()->first()->id,
            'opcion_id' => Opcion::inRandomOrder()->first()->id
        ];
    }
}
