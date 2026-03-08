<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $laboratorios = Laboratorio::all();
        return view('admin.laboratorios.index',compact('laboratorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.laboratorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
        ]);
        Laboratorio::create($request->all());
        return redirect()->route('admin.laboratorios.index')
                ->with('mensaje', 'Laboratorio registrado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorio $laboratorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $laboratorio = Laboratorio::find($id);
        return view('admin.laboratorios.edit', compact('laboratorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|max:100',
        ]);
        $laboratorio=Laboratorio::find($id);
        $laboratorio->update($request->all());
        return redirect()->route('admin.laboratorios.index')
                ->with('mensaje', 'Laboratorio Actualizado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $laboratorio=Laboratorio::find($id);
        $laboratorio->delete();

        return redirect()->route('admin.laboratorios.index')
                ->with('mensaje', 'Laboratorio eliminado correctamente')
                ->with('icono','success');
    }
}
