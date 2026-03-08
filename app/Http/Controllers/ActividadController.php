<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Docente;
use App\Models\Laboratorio;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $actividades = Actividad::with('docente','laboratorio')->get();
        $docentes=Docente::all();
        $laboratorios=Laboratorio::all();
        return view('admin.actividades.create', compact('docentes', 'laboratorios','actividades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'fecha_actividad' => 'required|date',
            'actividad_realizada' => 'required|string',
            'observaciones' => 'nullable|string',
            'estado' => 'required|string|max:100',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $existe = Actividad::where([
            ['docente_id', $request->inscripcion_materia_id],
            ['fecha_actividad', $request->fecha_actividad],
            ['laboratorio_id', $request->laboratorio_id],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
            
        ])->exists();

        if ($existe) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe una actividad realizada')
                ->with('icono', 'warning');
        }

        Actividad::create($request->all());

        return redirect()->route('admin.actividades.index')
            ->with('mensaje', 'Actividad creada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Actividad $actividad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $actividad = Actividad::findOrFail($id);
        $docentes=Docente::all();
        $laboratorios=Laboratorio::all(); 
        return view('admin.actividades.edit', compact('actividad','docentes','laboratorios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'docente_id' => 'required|exists:docentes,id',
            'fecha_actividad' => 'required|date',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'actividad_realizada' => 'required|string',
            'observaciones' => 'nullable|string',
            'estado' => 'required|string|max:100',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $existe = Actividad::where([
            ['docente_id', $request->inscripcion_materia_id],
            ['fecha_actividad', $request->fecha_actividad],
            ['laboratorio_id', $request->laboratorio_id],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
            
        ])->exists();

        if ($existe) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe una actividad actualizada')
                ->with('icono', 'warning');
        }
        $gestion = Actividad::findOrFail($id);
        $gestion->update($request->all());

        return redirect()->route('admin.actividades.index')
            ->with('mensaje', 'Actividad actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('admin.actividades.index')
            ->with('mensaje', 'Actividad eliminada correctamente')
            ->with('icono', 'success');
    }
}
