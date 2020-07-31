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
            $table->string("nombre");
            $table->integer("codigo");
            $table->integer("existencias");
            $table->unsignedBigInteger("bodega_id");
            $table->foreign("bodega_id")->references("id")->on("bodegas");
            $table->string("descripcion");
            $table->enum("estado", ['Activo', 'Inactivo', 'Pendiente']);
            $table->timestamps();
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
