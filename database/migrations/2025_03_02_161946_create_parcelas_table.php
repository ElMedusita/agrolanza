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
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->char('referencia_catastral', 20)->unique();
            $table->unsignedInteger('superficie');
            $table->decimal('latitud', 10, 6);
            $table->decimal('longitud', 10, 6);

            $table->string('ip_alta', 15)->nullable();
            $table->string('ip_ult_mod', 15)->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
