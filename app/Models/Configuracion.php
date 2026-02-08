<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    protected $table='configuraciones';

    protected $fillable=[
        'nombre',
        'facultad',
        'descripcion',
        'direccion',
        'codigo_postal',
        'telefono',
        'web',
        'logo',
        'facebook',
        'instagram',
        'twitter'
    ];
}
