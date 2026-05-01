<?php

namespace App\Http\Controllers;

use App\Models\Uso;
use Illuminate\Http\Request;

class UsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usos = Uso::all();
        return view('admin.usos.index', compact('usos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.usos.create');
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
        Uso::create($request->all());

        return redirect()->route('admin.usos.index')
            ->with('mensaje', 'Tipo uso creado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uso $uso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $uso = Uso::findOrFail($id);
        return view('admin.usos.edit', compact('uso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',

        ]);
        $uso=Uso::findOrFail($id);
        $uso->update($request->all());
        return redirect()->route('admin.usos.index')
            ->with('mensaje', 'Tipo uso actualizado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $uso = Uso::findOrFail($id);
        $uso->delete();
         return redirect()->route('admin.usos.index')
                ->with('mensaje','Tipo uso elimindado correctamente')
                ->with('icono','success');
    }
}
