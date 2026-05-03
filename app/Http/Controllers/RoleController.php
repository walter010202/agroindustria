<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:roles',
        ]);
        $rol= new Role();
        $rol->name = $request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'se registro el rol de manera correcta')
            ->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function permisos($id){
        $rol=Role::find($id);
        $permisos = Permission::all()->groupBy(function($permiso){
            if(stripos($permiso->name,'configuraciones') !==false){return 'Configuraciones';}
            if(stripos($permiso->name,'actividades') !==false){return 'Actividades';}
            if(stripos($permiso->name,'periodos') !==false){return 'Periodos';}
            if(stripos($permiso->name,'semestres') !==false){return 'Semestres';}
            if(stripos($permiso->name,'materias') !==false){return 'Materias';}
            if(stripos($permiso->name,'usos') !==false){return 'Uso de laboratorio';}
            if(stripos($permiso->name,'administrativos') !==false){return 'Administrativos';}
            if(stripos($permiso->name,'horarios') !==false){return 'Horarios';}
            if(stripos($permiso->name,'docentes') !==false){return 'Docentes';}
            if(stripos($permiso->name,'estudiantes') !==false){return 'Estudiantes';}
            if(stripos($permiso->name,'laboratorios') !==false){return 'Laboratorios';}
            if(stripos($permiso->name,'inscripciones') !==false){return 'Inscripciones';}
            if(stripos($permiso->name,'materiales_equipos') !==false){return 'Materiales y Equipos';}
            if(stripos($permiso->name,'roles') !==false){return 'Roles';}
            if(stripos($permiso->name,'asignaciones_estudiantes') !==false){return 'Asignar Estudiantes';}
            if(stripos($permiso->name,'calendario') !==false){return 'Calendario';}
            if(stripos($permiso->name,'grupos_academicos') !==false){return 'Grupos Academicos';}
        });
        //$roles = Role::all();
        return view('admin.roles.permisos', compact('permisos','rol'));
    }

    public function update_permisos(Request $request, $id){
        $rol = Role::find($id);
        $rol->permissions()->sync($request->input('permisos'));

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se modificaron los permisos de la manera correcta')
            ->with('icono', 'success');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role=Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
        ]);
        $rol=Role::find($id);
        $rol->name=$request->name;
        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje','Se modifico el rol de manera correcta')
            ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Role::destroy($id);

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Se elimino el rol de la manera correcta')
            ->with('icono', 'success');
    }
}
