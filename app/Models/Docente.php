<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    protected $table='docentes';

    protected $fillable = [
        'usuario_id',
        'nombres',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'profesion',
        'foto',
        'facultad',
        'carrera',
        'sede'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    
    public function asignacionEstudiantes(){
        return $this->hasMany(AsignacionEstudiante::class);
    }

    public function gruposAcademicos(){
        return $this->hasMany(GruposAcademico::class);
    }

    public function actividad(){
        return $this->hasMany(Actividad::class);
    }



}
