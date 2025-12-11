<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellido1', 60);
            $table->string('apellido2', 60)->nullable();
            $table->string('dni', 9)->unique();
            $table->integer('goles')->default(0);
            $table->integer('edad');
            $table->string('foto')->nullable();
            $table->foreignId('id_equipo');
            $table->timestamps();
            
            $table->foreign('id_equipo')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // CORREGIDO: El nombre de la tabla es 'jugadores', no 'jugadors'
        Schema::dropIfExists('jugadores');
    }
};