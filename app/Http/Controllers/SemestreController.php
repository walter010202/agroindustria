<?php

namespace App\Http\Controllers;

use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $semestres = Semestre::all();
        return view('admin.semestres.index', compact('semestres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.semestres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Semestre::create($request->all());

        return redirect()->route('admin.semestres.index')
            ->with('mensaje', 'Semestre creada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Semestre $semestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $semestre = Semestre::findOrFail($id);
        return view('admin.semestres.edit', compact('semestre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $semestre = Semestre::findOrFail($id);
        $semestre->update($request->all());
        return redirect()->route('admin.semestres.index')
            ->with('mensaje', 'Semestre actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $semestre = Semestre::findOrFail($id);
        $semestre->delete();

        return redirect()->route('admin.semestres.index')
            ->with('mensaje', 'Semestre eliminada correctamente')
            ->with('icono', 'success');
    }
}
