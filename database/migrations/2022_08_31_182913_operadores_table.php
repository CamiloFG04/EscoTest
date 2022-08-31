<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OperadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OPERADORES', function (Blueprint $table) {
            $table->id('ID_OPERADOR')->comment('Codigo del Operador');
            $table->string('NOMBRE',80)->comment('Nombre del Operador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OPERADORES');
    }
}
