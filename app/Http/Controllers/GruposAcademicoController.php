<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\GruposAcademico;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Semestre;
use Illuminate\Http\Request;

class GruposAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gruposAcademicos = GruposAcademico::all();
        return view('admin.grupos_academicos.index', compact('gruposAcademicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $docentes = Docente::all();
        $periodos = Periodo::all();
        $semestres = Semestre::all();
        $materias = Materia::all();
        return view('admin.grupos_academicos.create', compact('docentes','periodos','semestres','materias'));
    }

    public function buscar_docente($id)
    {

        //return response()->json([
        //'ok' => true,
        //'id' => $id
        //]);
        $docente = Docente::with('usuario','gruposAcademicos.periodo','gruposAcademicos.semestre', 'gruposAcademicos.materia')->find($id);
        if (!$docente){
            return response()->json(['error'=>'Docente no encontrado']);
        }

        $docente->foto_url = url($docente->foto);

        return response()->json($docente);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'docente_id' => 'required',
            'periodo_id' => 'required',
            'materia_id' => 'required',
            'semestre_id' => 'required',
            'paralelo' => 'required',
            'cant_estudiantes' => 'required|integer|min:1',
            
        ]);
        $grupos_academico=new GruposAcademico();
        $grupos_academico->docente_id = $request->docente_id;
        $grupos_academico->periodo_id = $request->periodo_id;
        $grupos_academico->materia_id = $request->materia_id;
        $grupos_academico->semestre_id = $request->semestre_id;
        $grupos_academico->paralelo = $request->paralelo;
        $grupos_academico->cant_estudiantes = $request->cant_estudiantes;
        $grupos_academico->estado= 'activo';

        $grupos_academico->save();
        return redirect()->route('admin.grupos_academicos.index')
                ->with('mensaje', 'Grupo academico registrado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(GruposAcademico $gruposAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $grupoAcademico = GruposAcademico::with(['docente.usuario','periodo','semestre','materia'])->findOrFail($id);
        $docentes = Docente::all();
        $periodos = Periodo::all();
        $semestres = Semestre::all();
        $materias = Materia::all();
        return view('admin.grupos_academicos.edit', compact('grupoAcademico','periodos','semestres','materias','docentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'docente_id' => 'required',
            'periodo_id' => 'required',
            'materia_id' => 'required',
            'semestre_id' => 'required',
            'paralelo' => 'required',
            'cant_estudiantes' => 'required|integer|min:1',
            
        ]);
        $grupos_academico=GruposAcademico::find($id);
        $grupos_academico->docente_id = $request->docente_id;
        $grupos_academico->periodo_id = $request->periodo_id;
        $grupos_academico->materia_id = $request->materia_id;
        $grupos_academico->semestre_id = $request->semestre_id;
        $grupos_academico->paralelo = $request->paralelo;
        $grupos_academico->cant_estudiantes = $request->cant_estudiantes;
        $grupos_academico->estado= 'activo';


        $grupos_academico->save();
        return redirect()->route('admin.grupos_academicos.index')
                ->with('mensaje', 'Grupo academico actualizado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $grupos_academico = GruposAcademico::find($id);
        $grupos_academico->delete();
        return redirect()->route('admin.grupos_academicos.index')
            ->with('mensaje', 'Grupo academico eliminado correctamente')
            ->with('icono', 'success');
    }
}
