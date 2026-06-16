<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->string('estado', 20)->change();
        });
    }

    public function down()
    {
        Schema::table('noticias', function (Blueprint $table) {
            $table->string('estado', 8)->change(); // O el tamaño original
        });
    }
};
