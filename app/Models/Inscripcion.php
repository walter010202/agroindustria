<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }

    public function semestre(){
        return $this->belongsTo(Semestre::class);
    }

    public function asignacionEstudiantes(){
        return $this->hasMany(AsignacionEstudiante::class);
    }
}
