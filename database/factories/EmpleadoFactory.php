<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empleado;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Empleado::class;

    public function definition(): array
    {
        return [
            'nombres' => $this->faker->name,
            'DNI' => $this->faker->unique()->numberBetween(10000000, 99999999),
            'direccion' => $this->faker->address,
            'fecha_de_nacimiento' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => $this->faker->phoneNumber,
            'horario' => $this->faker->randomElement(['Part-Time', 'Full-Time']),
        ];
    }
}
