<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdenTrabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ORDENTRAB', function (Blueprint $table) {
            $table->id('ID_ORDEN')->comment('Consecutivo de la Orden de Trabajo');
            $table->date('FECHA_CREACION')->comment('Fecha en la que se ha creado la orden');
            $table->date('FECHA_ASIGNACION')->comment('Fecha en la que se Asigna la orden');
            $table->date('FECHA_EJECUCION')->comment('Fecha en que se ejecuta la Orden');
            $table->foreignId('ID_TIPO')->constrained('TIPOORDEN','ID_TIPO')->comment('Codigo del Tipo de Orden');
            $table->foreignId('ID_OPERADOR')->constrained('OPERADORES','ID_OPERADOR')->comment('Codigo del Operador');
            $table->string('RESULTADO')->comment('Descripcion abierta del resultado');
            $table->double('VALOR',10,2)->comment('Valor de la actividad realizada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ORDENTRAB');
    }
}
