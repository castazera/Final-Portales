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
        Schema::create('servicio_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('servicio_id');
            $table->dateTime('fecha_adquisicion');
            $table->integer('duracion_meses')->nullable();
            $table->decimal('precio_pagado', 10, 2)->nullable();
            $table->string('estado')->default('activo'); // activo o cancelado
            $table->timestamps();
            $table->primary(['user_id', 'servicio_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_user');
    }
};
