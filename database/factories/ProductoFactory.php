<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'precio_venta' => $this->faker->randomNumber(3),
            'categoria_id' => $this->faker->randomElement([1,2,3,4]),
            'area_id' => $this->faker->randomElement([1,2,3,4,5,6]),
            'marca' => $this->faker->citySuffix
        ];
    }
}
