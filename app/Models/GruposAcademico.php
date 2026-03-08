<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposAcademico extends Model
{
    use HasFactory;

    protected $table='grupos_academicos';
    protected $fillable = [
        'docente_id',
        'periodo_id',
        'materia_id',
        'semestre_id',
        'paralelo',
        'estado',
        'cant_estudiantes'
    ];

    public function docente(){
        return $this->belongsTo(Docente::class);
    }
    
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function semestre(){
        return $this->belongsTo(Semestre::class);
    } 
    
    public function materia(){
        return $this->belongsTo(Materia::class);
    }
    public function horarios(){
        return $this->hasMany(Horario::class);
    }
}
