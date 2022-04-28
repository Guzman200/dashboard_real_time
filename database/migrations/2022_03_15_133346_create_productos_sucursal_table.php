<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosSucursalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_sucursal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('producto_id');
            $table->float('precio_compra');
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursales');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_sucursal');
    }
}