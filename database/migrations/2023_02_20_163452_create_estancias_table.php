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
            $table->dateTime('hora_entrada');
            $table->dateTime('hora_salida');
            $table->unsignedBigInteger('id_vehiculo');
            $table->timestamps();
        });
        Schema::table('estancias', function (Blueprint $table) {
            $table->foreign('id_vehiculo')->references('id_vehiculo')->on('vehiculos')->onDelete('cascade');
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
