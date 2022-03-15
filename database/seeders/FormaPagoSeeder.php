<?php

namespace Database\Seeders;

use App\Models\FormaPago;
use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormaPago::create(['descripcion' => 'Efectivo']);
        FormaPago::create(['descripcion' => 'Tarjeta']);
        FormaPago::create(['descripcion' => 'Transferencia']);
        FormaPago::create(['descripcion' => 'Pago en tiendas']);
        FormaPago::create(['descripcion' => 'A credito']);
    }
}
