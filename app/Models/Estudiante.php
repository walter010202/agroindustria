<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table='estudiantes';

    protected $fillable = [
        'nombres',
        'apellidos',
        'ci',
        'fecha_nacimiento',
        'telefono',
        'ref_celular',
        'persona_emergencia',
        'numero_emergencia',
        'direccion',
        'rol',
        'email',
        'foto',
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function inscripciones()
    {
    return $this->hasMany(Inscripcion::class);
    }



}
