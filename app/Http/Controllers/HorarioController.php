<?php

namespace App\Http\Controllers;

use App\Models\GruposAcademico;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $horarios = Horario::with('grupoAcademico.docente.usuario','grupoAcademico.periodo','grupoAcademico.materia','grupoAcademico.semestre')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $gruposAcademicos = GruposAcademico::all();
        return view('admin.horarios.create',compact('gruposAcademicos'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function buscar_grupo_academico($id){
        $grupoAcademico = GruposAcademico::with('docente.usuario','periodo','semestre','materia')->find($id);
        if (!$grupoAcademico){
            return response()->json(['error'=>'Grupo no encontrado']);
        }

        $grupoAcademico->foto_url = url($grupoAcademico->docente->foto);

        return response()->json($grupoAcademico);
    }
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'grupo_academico_id' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'aula' => 'required',
            
        ]);
        $existe = Horario::where([
            ['grupo_academico_id', $request->grupo_academico_id],
            ['dia', $request->dia],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
            ['aula', $request->aula],
        ])->first();

        if ($existe){
            return redirect()->route('admin.horarios.index')
                ->withInput()
                ->with('mensaje','Ya existe un horario del grupo academico con estos datos.')
                ->with('icono','warning');
        }


        $horario = new Horario();
        $horario->grupo_academico_id = $request->grupo_academico_id;
        $horario->dia= $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->aula = $request->aula;
        $horario->save();
        return redirect()->route('admin.horarios.index')
                ->with('mensaje','Se registro el horario de la manera correcta.')
                ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $horario = Horario::with('grupoAcademico.docente.usuario','grupoAcademico.periodo','grupoAcademico.materia','grupoAcademico.semestre')->findOrFail($id);
        $gruposAcademicos=GruposAcademico::all();
        return view('admin.horarios.edit', compact('horario','gruposAcademicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        $request->validate([
            'grupo_academico_id' => 'required',
            'dia' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'aula' => 'required',
            
        ]);
        $existe = Horario::where([
            ['grupo_academico_id', $request->grupo_academico_id],
            ['dia', $request->dia],
            ['hora_inicio', $request->hora_inicio],
            ['hora_fin', $request->hora_fin],
            ['aula', $request->aula],
        ])->first();

        if ($existe){
            return redirect()->route('admin.horarios.index')
                ->withInput()
                ->with('mensaje','Ya existe un horario del grupo academico con estos datos.')
                ->with('icono','warning');
        }


        $horario = Horario::find($id);
        $horario->grupo_academico_id = $request->grupo_academico_id;
        $horario->dia= $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->aula = $request->aula;
        $horario->save();
        return redirect()->route('admin.horarios.index')
                ->with('mensaje','Se actualizo el horario de la manera correcta.')
                ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
       $horario = Horario::findOrFail($id);
       $horario->delete();

       return redirect()->route('admin.grupos_academicos.index')
            ->with('mensaje', 'Horario eliminado correctamente')
            ->with('icono', 'success');
        
    }
}
