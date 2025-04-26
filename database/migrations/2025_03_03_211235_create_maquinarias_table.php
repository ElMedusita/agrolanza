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
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->id();
            $table->string('numero_serie', 20);
            $table->char('matricula', 10);
            $table->string('marca', 20);
            $table->string('descripcion', 200);
            
            $table->ipAddress('ip_alta')->nullable();            
            $table->ipAddress('ip_ult_mod')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinarias');
    }
};
