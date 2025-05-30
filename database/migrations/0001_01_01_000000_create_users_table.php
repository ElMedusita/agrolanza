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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('identificacion', 10)->unique();
            $table->string('name', 30);
            $table->string('apellidos', 60);
            $table->string('email', 40)->unique();
            $table->char('telefono', 12);
            $table->string('direccion', 150);
            $table->string('localidad', 50);
            $table->char('codigo_postal', 5);
            $table->char('iban', 24);
            $table->date('fecha_nacimiento');
            $table->date('fecha_comienzo');
            $table->date('fecha_fin')->nullable();
            $table->string('password');
            $table->rememberToken();
        
            $table->string('ip_alta', 15)->nullable();    
            $table->string('ip_ult_mod', 15)->nullable(); 
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
