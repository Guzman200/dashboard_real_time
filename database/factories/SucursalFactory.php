<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'estado' => $this->faker->state,
            'ciudad' => $this->faker->city,
            'cp'     => $this->faker->postcode
        ];
    }
}
