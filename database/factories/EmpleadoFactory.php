<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
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
            'sucursal_id'  => mt_rand(1, 100),
            'area_id'   => $this->faker->randomElement([1,2,3,4,5,6])
        ];
    }
}
