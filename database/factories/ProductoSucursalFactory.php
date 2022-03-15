<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoSucursalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'precio_compra' => $this->faker->randomNumber(2),
            'stock'        => mt_rand(1, 100),
            'sucursal_id'  => mt_rand(1, 100), 
            'producto_id'  => mt_rand(1, 250)
        ];
    }
}
