<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Administrativo;
use App\Models\AsignacionEstudiante;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Inscripcion;
use App\Models\Laboratorio;
use Illuminate\Http\Request;
use App\Models\Semestre;
use App\Models\Materia;
use App\Models\Materiales_equipo;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $total_semestres=Semestre::count();
        $total_materias=Materia::count();
        $total_roles=Role::count();
        $total_administrativos=Administrativo::count();
        $total_docentes=Docente::count();
        $total_estudiantes=Estudiante::count();
        $total_actividades=Actividad::count();
        $total_equipos=Materiales_equipo::count();
        $total_laboratorios=Laboratorio::count();

        $datos = Inscripcion::select(
            'periodos.nombre as periodo',
            DB::raw('COUNT(inscripcions.id) as total_inscripciones')
        )
        ->join('periodos', 'periodos.id', '=', 'inscripcions.periodo_id')
        ->groupBy('periodos.nombre')
        ->orderBy('periodos.nombre')
        ->get();

        $periodosArray = $datos->pluck('periodo')->toArray();
        $datosInscritos = $datos->pluck('total_inscripciones')->toArray();


        $inscritosPorLaboratorio = DB::table('asignacion_estudiantes')
        ->join('inscripcions', 'inscripcions.id', '=', 'asignacion_estudiantes.inscripcion_id')
        ->join('laboratorios', 'laboratorios.id', '=', 'asignacion_estudiantes.laboratorio_id')
        ->select(
            'laboratorios.nombre as laboratorio',
            DB::raw('COUNT(DISTINCT inscripcions.estudiante_id) as total')
        )
        ->groupBy('laboratorios.nombre')
        ->orderByDesc('total')
        ->get();

        $labsArray = $inscritosPorLaboratorio->pluck('laboratorio')->toArray();
        $labsInscritos = $inscritosPorLaboratorio->pluck('total')->toArray();

        $usoLaboratorioPorTurno = AsignacionEstudiante::select(
            'turno',
            DB::raw('COUNT(id) as total')
        )
        ->groupBy('turno')
        ->orderByDesc('total')
        ->get();

        $turnosLabels = $usoLaboratorioPorTurno->pluck('turno')->toArray();
        $turnosTotales = $usoLaboratorioPorTurno->pluck('total')->toArray();


        return view('admin.index', compact('total_semestres',
                                            'total_materias',
                                            'total_roles',
                                            'total_administrativos',
                                            'total_docentes',
                                            'total_estudiantes',
                                            'total_actividades',
                                            'total_equipos',
                                            'total_laboratorios',
                                            'periodosArray', 'datosInscritos',
                                            'labsArray','labsInscritos',
                                            'turnosLabels','turnosTotales'));
    }
}
