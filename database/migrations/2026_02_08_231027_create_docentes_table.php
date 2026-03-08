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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nombres',100);
            $table->string('apellidos',100);
            //Cédula ecuatoriana:10 caracteres
            $table->string('ci',10)->unique();
            $table->date('fecha_nacimiento');
            //telefono ecuatoriana:10 caracteres
            $table->string('telefono',10);
            $table->string('profesion',100);
            $table->string('direccion',100);
            $table->text('foto');
            $table->string('facultad');
            $table->string('carrera',100);
            $table->string('sede',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
