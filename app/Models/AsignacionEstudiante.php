<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionEstudiante extends Model
{
    use HasFactory;

    protected $table = 'asignacion_estudiantes';

    protected $fillable = [
    'inscripcion_id',
    'turno',
    'hora_inicio',
    'hora_fin',
    'laboratorio_id',
    'docente_id',
    'tipo_uso',
    'observaciones',
    'fecha_asignacion'
    ];

    public function inscripcion(){
        return $this->belongsTo(Inscripcion::class);
    }

    public function laboratorio(){
        return $this->belongsTo(Laboratorio::class);
    }

    public function docente(){
        return $this->belongsTo(Docente::class);
    }
}
