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
        Schema::create('servicios_maquinarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_maquinaria');

            $table->string('ip_alta', 15)->nullable();
            $table->string('ip_ult_mod', 15)->nullable();

            $table->timestamps();

            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreign('id_maquinaria')->references('id')->on('maquinarias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_maquinarias');
    }
};
