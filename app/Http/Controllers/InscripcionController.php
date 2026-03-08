<?php

namespace App\Http\Controllers;

use App\Models\AsignacionEstudiante;
use App\Models\Configuracion;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\Inscripcion;
use App\Models\Laboratorio;
use App\Models\Periodo;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;
use Milon\Barcode\Facades\DNS1DFacade as DNS2D;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $inscripciones = Inscripcion::all();
        $laboratorios=Laboratorio::all();
        $docentes=Docente::all();
        $asignacionEstudiantes = AsignacionEstudiante::all();
        return view('admin.inscripciones.index', compact('inscripciones','asignacionEstudiantes','laboratorios','docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $periodos= Periodo::all();
        $semestres= Semestre::all();
        $estudiantes = Estudiante::all();
        return view('admin.inscripciones.create', compact('estudiantes', 'periodos', 'semestres'));
    }

    public function buscar_estudiante($id){
        $estudiante = Estudiante::with('usuario','inscripciones.periodo', 'inscripciones.semestre')->find($id);
        if (!$estudiante){
            return response()->json(['error'=>'Estudiante no encontrado']);
        }

        $estudiante->foto_url = url($estudiante->foto);

        return response()->json($estudiante);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();
        //return response()->json($datos);

        $request->validate([
            'estudiante_id' => 'required',
            'periodo_id' => 'required',
            'sede' => 'required',
            'facultad' => 'required',
            'carrera' => 'required',
            'semestre_id' => 'required',
            'paralelo' => 'required',
        ]);

        $inscripcion=new Inscripcion();
        $inscripcion->estudiante_id = $request->estudiante_id;
        $inscripcion->periodo_id = $request->periodo_id;
        $inscripcion->sede = $request->sede;
        $inscripcion->facultad = $request->facultad;
        $inscripcion->carrera = $request->carrera;
        $inscripcion->semestre_id = $request->semestre_id;
        $inscripcion->paralelo = $request->paralelo;
        $inscripcion->fecha_inscripcion = now();
        $inscripcion->save();

        return redirect()->route('admin.inscripciones.index')
                ->with('mensaje', 'Inscripcion registrado correctamente')
                ->with('icono', 'success');
    }

    public function pdf_inscripcion($id){
        //echo $id;
        $configuracion=Configuracion::first();
        $inscripcion=Inscripcion::with('estudiante','periodo','semestre')->find($id);
        $asignacionEstudiantes= AsignacionEstudiante::with('docente','laboratorio')
            ->where('inscripcion_id',$inscripcion->id)->get();
        $barcodePNG='data:image/png;base64,' .DNS1D::getBarcodePNG($inscripcion->estudiante->ci, 'C128', 1, 33);
        
        
        $pdf = PDF::loadView('admin.inscripciones.pdf_inscripcion',compact('configuracion' ,'inscripcion', 'barcodePNG', 'asignacionEstudiantes'));
        $pdf->setPaper('letter','portrait');
        $pdf->setOption(['defaultFont'=>'sans-serif']);
        $pdf->setOption(['isHtml5ParserEnabled'=>true]);
        $pdf->setOption(['isRemoteEnabled'=>true]);
        //$pdf->setOption(['isFontSubsettingEnabled'=>true]);
        //$pdf->setOption(['isPhpEnabled'=>true]);
        //$pdf->setOption(['dpi'=>150]);
        return $pdf->stream('inscripciones.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inscripcion $inscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $inscripcion = Inscripcion::with('estudiante','periodo','semestre')->find($id);
        $periodos=Periodo::all();
        $semestres=Semestre::all();
        $estudiantes=Estudiante::all();
        return view('admin.inscripciones.edit', compact('inscripcion','periodos','semestres','estudiantes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'estudiante_id' => 'required',
            'periodo_id' => 'required',
            'sede' => 'required',
            'facultad' => 'required',
            'carrera' => 'required',
            'semestre_id' => 'required',
            'paralelo' => 'required',
        ]);

        $inscripcion= Inscripcion::find($id);
        $inscripcion->estudiante_id = $request->estudiante_id;
        $inscripcion->periodo_id = $request->periodo_id;
        $inscripcion->sede = $request->sede;
        $inscripcion->facultad = $request->facultad;
        $inscripcion->carrera = $request->carrera;
        $inscripcion->semestre_id = $request->semestre_id;
        $inscripcion->paralelo = $request->paralelo;
        $inscripcion->fecha_inscripcion = now();
        $inscripcion->save();
        return redirect()->route('admin.inscripciones.index')
                ->with('mensaje', 'Inscripcion actualizado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $inscripcion = Inscripcion::find($id);

        if (!$inscripcion) {
            return redirect()->route('admin.inscripciones.index')
                ->with('mensaje', 'La inscripción no existe')
                ->with('icono', 'error');
        }

        $inscripcion->delete();

        return redirect()->route('admin.inscripciones.index')
            ->with('mensaje', 'Inscripción eliminada correctamente')
            ->with('icono', 'success');

    }
}
