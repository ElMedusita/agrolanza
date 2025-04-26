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
        Schema::create('fitosanitarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 29);
            $table->string('marca', 29);
            $table->string('numero_registro', 29);
            $table->char('tipo', 2);
            $table->char('estado', 2);
            $table->string('descripcion', 200);
            $table->string('entidad_vendedora', 40);
            $table->string('materia_activa', 30);
            $table->decimal('cantidad_materia_activa', 5, 2);
            $table->decimal('dosis_maxima', 5, 2);
            $table->integer('plazo_seguridad');
            $table->string('observaciones', 200)->nullable();
    
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
        Schema::dropIfExists('fitosanitarios');
    }
};
