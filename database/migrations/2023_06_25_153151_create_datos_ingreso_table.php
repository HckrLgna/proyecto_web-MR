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
        Schema::create('datos_ingreso', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->string('estado');
            $table->unsignedBigInteger('id_beneficiario');
            $table->foreign('id_beneficiario')->references('id')->on('beneficiarios')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_ingreso');
    }
};
