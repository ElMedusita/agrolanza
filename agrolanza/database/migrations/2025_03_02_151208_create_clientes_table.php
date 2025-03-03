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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->char('identificacion', 10)->unique();
            $table->string('nombre', 30);
            $table->string('apellidos', 60);
            $table->string('email', 40)->nullable();
            $table->char('telefono', 12);
            $table->char('codigo_postal', 5);
            
            $table->string('ip_alta', 15)->nullable();
            $table->string('ip_ult_mod', 15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
