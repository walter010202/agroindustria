<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('usuario.roles')->get();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.estudiantes.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'ci'=>'required|digits:10|unique:estudiantes,ci',
            'fecha_nacimiento'=>'required|date',
            'telefono'=>'required|digits:10',
            'ref_celular'=>'required|digits:10',
            'persona_emergencia'=>'required',
            'numero_emergencia'=>'required|digits:10',
            'direccion'=>'required|string|max:100',
            'rol'=>'required',
            'email'=>'required|unique:users',
            'foto'=>'required|image',
        ]);

        $usuario = User::where('email', $request->email)->first();
        if (!$usuario) {
            $usuario = new User();
            $usuario->name = $request->nombres . ' ' . $request->apellidos;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->ci);
            $usuario->save();

            $usuario->assignRole($request->rol);
        }

        $estudiante=new Estudiante();
        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->ref_celular = $request->ref_celular;
        $estudiante->persona_emergencia = $request->persona_emergencia;
        $estudiante->numero_emergencia = $request->numero_emergencia;
        $estudiante->direccion = $request->direccion;
        
        $foto = $request->file('foto');
        $nombreArhivo = time() . '_' . $foto->getClientOriginalName();
        $rutaDestino = public_path('uploads/fotos_estudiantes');
        $foto->move($rutaDestino, $nombreArhivo);
        $fotoPath = 'uploads/fotos_estudiantes/' . $nombreArhivo;
        $estudiante->foto = $fotoPath;
        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
                ->with('mensaje', 'Estudiante registrado correctamente')
                ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        $roles=Role::all();
        return view('admin.estudiantes.show', compact('estudiante','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $roles = Role::all();
        return view('admin.estudiantes.edit', compact('estudiante', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $estudiante = Estudiante::find($id);
        $request->validate([
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'ci'=>'required|digits:10|unique:estudiantes,ci,'.$id,
            'fecha_nacimiento'=>'required|date',
            'telefono'=>'required|digits:10',
            'ref_celular'=>'required|digits:10',
            'persona_emergencia'=>'required',
            'numero_emergencia'=>'required|digits:10',
            'direccion'=>'required|string|max:100',
            'rol'=>'required',
            'email' => 'required|unique:users,email,' . $estudiante->usuario_id,
            'foto'=>'nullable|image',
        ]);



       if (!$estudiante->usuario) {
            return redirect()->back()
                ->with('mensaje', 'El estudiante no tiene usuario asociado')
                ->with('icono', 'error');
        }

        $usuario = $estudiante->usuario;
        $usuario->name = $request->nombres . ' ' . $request->apellidos;
        $usuario->email = $request->email;

        // Solo actualiza la contraseña si cambia la cédula
        if (!Hash::check($request->ci, $usuario->password)) {
            $usuario->password = Hash::make($request->ci);
        }

        $usuario->save();

        $usuario->syncRoles($request->rol);

        $estudiante->usuario_id = $usuario->id;
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->ci = $request->ci;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->telefono = $request->telefono;
        $estudiante->persona_emergencia = $request->persona_emergencia;
        $estudiante->numero_emergencia = $request->numero_emergencia;
        $estudiante->direccion = $request->direccion;

        if($request->hasFile('foto')){

            if($estudiante->foto && file_exists(public_path($estudiante->foto))) {
            unlink(public_path($estudiante->foto));
            }


            $foto = $request->file('foto');
            $nombreArhivo = time() . '_' . $foto->getClientOriginalName();
            $rutaDestino = public_path('uploads/fotos_estudiantes');
            $foto->move($rutaDestino, $nombreArhivo);
            $fotoPath = 'uploads/fotos_estudiantes/' . $nombreArhivo;
            $estudiante->foto = $fotoPath;

            

        }
        $estudiante->save();

        return redirect()->route('admin.estudiantes.index')
                ->with('mensaje', 'Se actulizo los datos de manera correcta correctamente')
                ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $estudiante = Estudiante::find($id);
        $usuario = User::find($estudiante->usuario_id);

        if($estudiante->foto && file_exists(public_path($estudiante->foto))) {
            unlink(public_path($estudiante->foto));
        }

        $estudiante->delete();
        $usuario->delete();
        return redirect()->route('admin.estudiantes.index')
                ->with('mensaje', 'Se elimino los datos del estudiante correctamente')
                ->with('icono', 'success');
    }
}
