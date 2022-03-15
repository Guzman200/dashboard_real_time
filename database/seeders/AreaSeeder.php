<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create(['nombre'  => 'Electronicos']);
        Area::create(['nombre'  => 'Ferretería']);
        Area::create(['nombre'  => 'Dulcería']);
        Area::create(['nombre'  => 'Farmaceutico']);
        Area::create(['nombre'  => 'Comida']);
        Area::create(['nombre'  => 'Frutas y verduras']);
    }
}
