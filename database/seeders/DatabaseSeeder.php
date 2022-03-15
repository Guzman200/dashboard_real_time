<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\FormaPago;
use App\Models\Producto;
use App\Models\ProductoSucursal;
use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory(100)->create();
        Sucursal::factory(100)->create();
        $this->call(AreaSeeder::class);
        Empleado::factory(100)->create();
        $this->call(FormaPagoSeeder::class);
        $this->call(CategoriasSeeder::class);
        Producto::factory(250)->create();
        ProductoSucursal::factory(500)->create();
    }
}
