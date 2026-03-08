<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEstudiante;
use Illuminate\Http\Request;

class AsignacionEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

         $request->validate([
            'inscripcion_id'=>'required',
            'turno'=>'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'laboratorio_id'=>'required',
            'docente_id'=>'required',
            'tipo_uso'=>'required',
            'observaciones'=>'required',
            'fecha_asignacion'=>'required',
            
        ]);

        $existe = AsignacionEstudiante::where('laboratorio_id', $request->laboratorio_id)
        ->where('fecha_asignacion', $request->fecha_asignacion)
        ->where(function ($query) use ($request) {
            $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_fin])
                ->orWhereBetween('hora_fin', [$request->hora_inicio, $request->hora_fin]);
        })
        ->exists();


        if ($existe) {
        return redirect()->back()
            ->with('warning', '⚠️ Ya existe una asignación de laboratorio con los mismos datos.')
            ->withInput();
        }


        $asignacionEstudiante=new AsignacionEstudiante();
        $asignacionEstudiante->inscripcion_id= $request->inscripcion_id;
        $asignacionEstudiante->turno= $request->turno;
        $asignacionEstudiante->hora_inicio= $request->hora_inicio;
        $asignacionEstudiante->hora_fin= $request->hora_fin;
        $asignacionEstudiante->laboratorio_id= $request->laboratorio_id;
        $asignacionEstudiante->docente_id= $request->docente_id;
        $asignacionEstudiante->tipo_uso= $request->tipo_uso;
        $asignacionEstudiante->observaciones= $request->observaciones;
        $asignacionEstudiante->fecha_asignacion= $request->fecha_asignacion;
        $asignacionEstudiante->save();

        return redirect()->route('admin.inscripciones.index')
                ->with('mensaje', 'Se asignado el laboratorio de manera correcta')
                ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsignacionEstudiante $asignacionEstudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignacionEstudiante $asignacionEstudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AsignacionEstudiante $asignacionEstudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $asignacionEstudiante = AsignacionEstudiante::findOrFail($id);
        $asignacionEstudiante->delete();
        return redirect()->route('admin.inscripciones.index')
            ->with('mensaje', 'Se elimino la asignación de laboratorio de la manera correcta')
            ->with('icono','sucess');
    }
}
