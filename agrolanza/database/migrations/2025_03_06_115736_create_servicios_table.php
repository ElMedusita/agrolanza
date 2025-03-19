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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_servicio', ['CP', 'CM', 'SC', 'SS']);
            $table->string('descripcion', 60);
            $table->timestamp('fecha_servicio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('duracion');
            $table->decimal('presupuesto', 7, 2);
            $table->enum('metodo_pago', ['EF', 'TA', 'TR']);
            $table->enum('estado', ['P', 'N']);
            $table->unsignedBigInteger('id_parcela');

            $table->string('ip_alta', 15)->nullable();
            $table->string('ip_ult_mod', 15)->nullable();
            
            $table->timestamps();

            $table->foreign('id_parcela')->references('id')->on('parcelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
