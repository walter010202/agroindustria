<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiales_equipo extends Model
{
    use HasFactory;
    protected $table='materiales_equipos';
    protected $fillable=[
        'laboratorio_id',
        'articulo',
        'marca',
        'tipo',
        'descripcion',
        'observacion',
        'estado',
    ];
    
    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

}
