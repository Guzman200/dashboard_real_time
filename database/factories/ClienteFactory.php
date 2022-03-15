<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'    => $this->faker->name,
            'a_paterno' => $this->faker->lastName,
            'a_materno' => $this->faker->lastName,
            'telefono'  => $this->faker->e164PhoneNumber
        ];
    }
}
