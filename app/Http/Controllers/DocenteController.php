<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $docentes = Docente::all();
        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles= Role::all();
        return view('admin.docentes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'ci'=>'required|digits:10|unique:docentes,ci',
            'fecha_nacimiento'=>'required|date',
            'telefono'=>'required|digits:10',
            'direccion'=>'required|string|max:100',
            'profesion'=>'required|string|max:100',
            'rol'=>'required',
            'email'=>'required|email',
            'foto'=>'required|image',
            'facultad'=>'required',
            'carrera' => 'required|string|max:100',
            'sede' => 'required|string|max:100',
        ]);
        $usuario = User::where('email', $request->email)->first();

        if (!$usuario) {
            $usuario = new User();
            $usuario->name = $request->nombres . " " . $request->apellidos;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->ci);
            $usuario->save();

            $usuario->assignRole($request->rol);
        }

        $docente=new Docente();
        $docente->usuario_id = $usuario->id;
        $docente->nombres = $request->nombres;
        $docente->apellidos = $request->apellidos;
        $docente->ci = $request->ci;
        $docente->fecha_nacimiento = $request->fecha_nacimiento;
        $docente->telefono = $request->telefono;
        $docente->direccion = $request->direccion;
        $docente->profesion = $request->profesion;
        $docente->facultad = $request->facultad;
        $docente->carrera = $request->carrera;
        $docente->sede = $request->sede;
        
        $foto = $request->file('foto');
        $nombreArhivo = time() . '_' . $foto->getClientOriginalName();
        $rutaDestino = public_path('uploads/fotos_docente');
        $foto->move($rutaDestino, $nombreArhivo);
        $fotoPath = 'uploads/fotos_docente/' . $nombreArhivo;
        $docente->foto = $fotoPath;

        $docente->save();

        return redirect()->route('admin.docentes.index')
                ->with('mensaje', 'Docente registrado correctamente')
                ->with('icono', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $docente = Docente::find($id);
        $roles= Role::all();
        //$formaciones = $docente->formaciones; // ya cargadas por la relación

        return view('admin.docentes.show', compact('docente','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $docente = Docente::find($id);
        $roles= Role::all();
        return view('admin.docentes.edit', compact ('docente', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $docente = Docente::find($id);
        $request->validate([
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'ci' => 'required|digits:10|unique:docentes,ci,' . $docente->id,
            'fecha_nacimiento'=>'required|date',
            'telefono'=>'required|digits:10',
            'direccion'=>'required|string|max:100',
            'profesion'=>'required|string|max:100',
            'rol'=>'required',
            'email'=>'required|email|unique:users,email,' . $docente->usuario->id,
            'foto'=>'nullable|image',
            'facultad'=>'required',
            'carrera' => 'required|string|max:100',
            'sede' => 'required|string|max:100',
        ]);

        $usuario=User::find($docente->usuario_id);
        $usuario->name=$request->nombres."".$request->apellidos;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request->ci);
        $usuario->save();

        $usuario->syncRoles($request->rol);

        $docente->usuario_id = $usuario->id;
        $docente->nombres = $request->nombres;
        $docente->apellidos = $request->apellidos;
        $docente->ci = $request->ci;
        $docente->fecha_nacimiento = $request->fecha_nacimiento;
        $docente->telefono = $request->telefono;
        $docente->direccion = $request->direccion;
        $docente->profesion = $request->profesion;
        $docente->facultad = $request->facultad;
        $docente->carrera = $request->carrera;
        $docente->sede = $request->sede;

        if($request->hasFile('foto')){

            if($docente->foto && file_exists(public_path($docente->foto))) {
            unlink(public_path($docente->foto));
            }


            $foto = $request->file('foto');
            $nombreArhivo = time() . '_' . $foto->getClientOriginalName();
            $rutaDestino = public_path('uploads/fotos_docente');
            $foto->move($rutaDestino, $nombreArhivo);
            $fotoPath = 'uploads/fotos_docente/' . $nombreArhivo;
            $docente->foto = $fotoPath;

            

        }
        
        $docente->save();

        return redirect()->route('admin.docentes.index')
                ->with('mensaje', 'Se actualizo los datos del docente correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $docente = Docente::find($id);
        $usuario = User::find($docente->usuario_id);

        if($docente->foto && file_exists(public_path($docente->foto))) {
            unlink(public_path($docente->foto));
        }

        $docente->delete();
        $usuario->delete();
        return redirect()->route('admin.docentes.index')
                ->with('mensaje', 'Se elimino los datos del docente correctamente')
                ->with('icono', 'success');
    }
}
