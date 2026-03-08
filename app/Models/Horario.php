<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $table='horarios';
    protected $fillable = [
        'grupo_academico_id',
        'dia',
        'hora_inicio',
        'hora_fin',
        'aula'
    ];
    public function grupoAcademico(){
        return $this->belongsTo(GruposAcademico::class, 'grupo_academico_id');
    }
}
