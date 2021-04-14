<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_materias', function (Blueprint $table) {
            $table->integer('idControl')->primary();
            $table->integer('idAlumno')->unsigned();
            $table->string('idmaterias');
            $table->string('estado');
            $table->foreign('idAlumno')->references('idAlumno')->on('alumnos');
            $table->foreign('idmaterias')->references('idmaterias')->on('materias');
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
        Schema::dropIfExists('control_materias');
    }
}
