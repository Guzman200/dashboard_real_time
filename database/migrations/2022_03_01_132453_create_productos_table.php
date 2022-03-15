<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('marca');
            $table->string('stock');
            $table->float('precio_venta');
            $table->unsignedBigInteger('sucursal_id');
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')
                ->on('sucursales');

            $table->foreign('area_id')->references('id')
                ->on('areas');

            $table->foreign('categoria_id')->references('id')
                ->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
