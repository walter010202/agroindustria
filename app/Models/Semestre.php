<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $table='semestres';
    protected $fillable=[
        'nombre',
    ];

    public function inscripciones()
    {
    return $this->hasMany(Inscripcion::class);
    }

    public function gruposAcademicos(){
        return $this->hasMany(GruposAcademico::class);
    }
    
}
