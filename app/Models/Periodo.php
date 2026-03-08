<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    protected $table='periodos';
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
