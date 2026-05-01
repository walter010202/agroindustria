<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEstudiante;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    //
   public function index()
    {
        return view('admin.calendario.index');
    }

    public function eventos()
    {
        $asignaciones = AsignacionEstudiante::with('laboratorio','docente','uso')->get();

        $eventos = [];

        foreach ($asignaciones as $asignacion) {

            $eventos[] = [
                'title' => $asignacion->laboratorio->nombre 
                            . " | " 
                            . date('H:i', strtotime($asignacion->hora_inicio)) 
                            . " - " 
                            . date('H:i', strtotime($asignacion->hora_fin)),

                'start' => $asignacion->fecha_asignacion . 'T' . $asignacion->hora_inicio,
                'end'   => $asignacion->fecha_asignacion . 'T' . $asignacion->hora_fin,

                'extendedProps' => [
                    'docente' => $asignacion->docente->nombres . ' ' . $asignacion->docente->apellidos,
                    'turno' => $asignacion->turno,
                    'uso' => $asignacion->uso->nombre,
                    'observaciones' => $asignacion->observaciones,
                ]
            ];
        }

        return response()->json($eventos);
    }
}
