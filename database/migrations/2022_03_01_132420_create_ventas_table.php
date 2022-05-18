<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('empleado_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('forma_pago_id');
            $table->float('total');
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')
                ->on('sucursales')
                ->onDelete('cascade');
            $table->foreign('empleado_id')->references('id')
                ->on('empleados')
                ->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')
                ->on('clientes')
                ->onDelete('cascade');
            $table->foreign('forma_pago_id')->references('id')
                ->on('forma_pago')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
