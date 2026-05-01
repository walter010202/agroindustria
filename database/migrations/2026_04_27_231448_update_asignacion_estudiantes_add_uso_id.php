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
        Schema::table('asignacion_estudiantes', function (Blueprint $table) {
        // eliminar columna antigua
        $table->dropColumn('tipo_uso');

        // nueva relación
        $table->foreignId('uso_id')
              ->after('docente_id')
              ->constrained('usos')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asignacion_estudiantes', function (Blueprint $table) {
        $table->dropForeign(['uso_id']);
        $table->dropColumn('uso_id');

        $table->string('tipo_uso'); // volver atrás
        });
    }
};
