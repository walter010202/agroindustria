<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $configuracion=Configuracion::first();
        return view ('admin.configuraciones.index', compact('configuracion'));
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

            'nombre'=>'required|string|max:255',
            'facultad'=>'required|string|max:255',
            'descripcion'=>'required|string|max:255',
            'direccion'=>'required|string|max:255',
            'codigo_postal'=>'required|string|max:255',
            'telefono'=>'required|string|max:255',
            'web'=>'required|url|max:255',
            'logo'=>'image|mimes:jpeg,png,jpg',
            'facebook'=>'required|string|max:255',
            'instagram'=>'required|string|max:255',
            'twitter'=>'required|string|max:255',
        ]);

        //Buscar si existe un registro
        $configuracion = Configuracion::first();
        //Si hay un archivo de logo, lo procesamos
        if ($request->hasFile('logo')){
            $logo = $request->file('logo');
            $nombreArchivo = time() . '_' . $logo->getClientOriginalName();
            $rutaDestino= public_path('uploads/logos');
            $logo->move($rutaDestino,$nombreArchivo);
            $logoPath = 'uploads/logos' . $nombreArchivo;

        }else{
            //si no se sube un nuevo logo mantener el actual
            $logoPath = $configuracion->logo ?? null;

        }

        if ($configuracion) {
            //Si existe, actualizar
            $configuracion -> update([
                'nombre'=>$request->nombre,
                'facultad'=>$request->facultad,
                'descripcion'=>$request->descripcion,
                'direccion'=>$request->direccion,
                'codigo_postal'=>$request->codigo_postal,
                'telefono'=>$request->telefono,
                'web'=>$request->web,
                'logo'=>$logoPath,
                'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,
                'twitter'=>$request->twitter,

            ]);
        } else {
            Configuracion::create([

                'nombre'=>$request->nombre,
                'facultad'=>$request->facultad,
                'descripcion'=>$request->descripcion,
                'direccion'=>$request->direccion,
                'codigo_postal'=>$request->codigo_postal,
                'telefono'=>$request->telefono,
                'web'=>$request->web,
                'logo'=>$logoPath,
                'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,
                'twitter'=>$request->twitter,

            ]);
        }

        return redirect()->back()
            ->with('mensaje', 'Configuración guardada Correctamente')
            ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
}
