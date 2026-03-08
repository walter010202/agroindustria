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
        Schema::create('materiales_equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laboratorio_id')
            ->constrained('laboratorios')
            ->onDelete('cascade');
            $table->string('articulo');
            $table->string('marca');
            $table->string('descripcion');
            $table->string('observacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales_equipos');
    }
};
