<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('fecha');
            $table->string('estado');
            $table->string('detalle');
            $table->unsignedBigInteger('id_informe_academico');
            $table->unsignedBigInteger('id_ficha_clinica');
            $table->unsignedBigInteger('id_ingreso');
            $table->unsignedBigInteger('id_eduacion_familiar');
            $table->foreign('id_informe_academico')->references('id')->on('informe_academico')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ficha_clinica')->references('id')->on('ficha_clinica')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ingreso')->references('id')->on('datos_ingreso')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_educacion_familiar')->references('id')->on('educacion_familiar')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertas');
    }
};
