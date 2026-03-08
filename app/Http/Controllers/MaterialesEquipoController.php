<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use App\Models\Materiales_equipo;
use Illuminate\Http\Request;

class MaterialesEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Laboratorio $laboratorio)
    {
        //
        return view('admin.materiales_equipos.index', [
            'laboratorio' => $laboratorio,
            'materiales_equipos' => $laboratorio->materialesEquipos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Laboratorio $laboratorio)
    {
        //
        return view('admin.materiales_equipos.create', compact('laboratorio'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Laboratorio $laboratorio)
    {
        //
        $request->validate([
            'articulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'observacion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $laboratorio->materialesEquipos()->create($request->all());

        return redirect()
            ->route('admin.materiales_equipos.index', $laboratorio->id)
            ->with('mensaje', 'Material registrado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materiales_equipo $materiales_equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Laboratorio $laboratorio, Materiales_equipo $material)
    {
        //
        return view('admin.materiales_equipos.edit', compact(
            'laboratorio',
            'material'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratorio $laboratorio, Materiales_equipo $materiales_equipo)
    {
        //
        $request->validate([
            'articulo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'observacion' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $materiales_equipo->update($request->all());

        return redirect()
            ->route('admin.materiales_equipos.index', $laboratorio->id)
            ->with('mensaje', 'Material actualizado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materiales_equipo $materiales_equipo, $laboratorio)
    {
        //

        $materiales_equipo->delete();
         return redirect()
            ->route('admin.materiales_equipos.index', $laboratorio->id)
            ->with('mensaje', 'Material Eliminado correctamente')
            ->with('icono', 'success');
    }
}
