<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use HasFactory;
    protected $table='laboratorios';
    protected $fillable=[
        'nombre',
        'descripcion',
        'estado',
    ];
    public function materialesEquipos()
    {
    return $this->hasMany(Materiales_Equipo::class);
    }

    public function asignacionEstudiantes(){
        return $this->hasMany(AsignacionEstudiante::class);
    }

}
