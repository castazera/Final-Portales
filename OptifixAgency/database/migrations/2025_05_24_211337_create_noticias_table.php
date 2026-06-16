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
            Schema::create('noticias', function (Blueprint $table) {
                $table->id();
                $table->string('titulo');
                $table->text('resumen');
                $table->longText('contenido');
                $table->string('autor');
                $table->string('imagen')->nullable(); // URL o ruta del archivo
                $table->string('categoria')->nullable();
                $table->enum('estado', ['publicada', 'borrador'])->default('publicada');
                $table->timestamps(); // incluye created_at y updated_at
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias');
    }
};
