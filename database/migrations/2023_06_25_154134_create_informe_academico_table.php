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
        Schema::create('informe_academico', function (Blueprint $table) {
            $table->id();
            $table->string('grado');
            $table->string('nombre_colegio');
            $table->string('direccion_colegio');
            $table->string('desempeño');
            $table->unsignedBigInteger('id_beneficiario');
            $table->foreign('id_beneficiario')->references('id')->on('beneficiarios')->onUpdate('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informe_academico');
    }
};
