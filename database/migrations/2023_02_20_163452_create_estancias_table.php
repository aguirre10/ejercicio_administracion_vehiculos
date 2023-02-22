<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estancias', function (Blueprint $table) {
            $table->bigIncrements('id_estancia');
            $table->string('placa');
            $table->string('estado');
            $table->dateTime('hora_entrada');
            $table->dateTime('hora_salida');
            $table->integer('pago');
            $table->integer('pago_acumulado');
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
        Schema::dropIfExists('estancias');
    }
}
