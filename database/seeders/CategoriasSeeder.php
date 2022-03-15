<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre' => 'Dulces']);
        Categoria::create(['nombre' => 'Lacteos']);
        Categoria::create(['nombre' => 'Jugos']);
        Categoria::create(['nombre' => 'Sabritas']);
    }
}
