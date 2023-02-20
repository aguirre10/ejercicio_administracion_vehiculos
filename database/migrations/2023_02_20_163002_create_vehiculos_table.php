<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id_vehiculo');
            $table->string('placa');
            $table->string('estado');
            $table->unsignedBigInteger('id_tipo_vehiculo');
            $table->timestamps();
        });

        Schema::table('vehiculos', function (Blueprint $table) {
            $table->foreign('id_tipo_vehiculo')->references('id_tipo_vehiculo')->on('tipo_vehiculo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
