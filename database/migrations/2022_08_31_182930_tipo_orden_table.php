<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TipoOrdenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TIPOORDEN', function (Blueprint $table) {
            $table->id('ID_TIPO')->comment('Codigo del Tipo de Orden');
            $table->string('NOMBRE',30)->comment('Nombre del Tipo de Orden');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TIPOORDEN');
    }
}
