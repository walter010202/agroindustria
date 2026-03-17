<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $administrativo = Role::create(['name'=>'Administrativo']);
        $docente= Role::create(['name'=>'Docente']);
        $estudiante= Role::create(['name'=>'Estudiante']);
        $admin= Role::create(['name'=>'Administrador']);
        //--------------------CONFIGURACIONES-----------------------------------------
        Permission::create(['name'=>'admin.configuraciones.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.store'])->syncRoles($admin);
        //--------------------SEMESTRES-----------------------------------------------
        Permission::create(['name'=>'admin.semestres.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.semestres.destroy'])->syncRoles($admin);
        //--------------------PERIODOS------------------------------------------------
        Permission::create(['name'=>'admin.periodos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.periodos.destroy'])->syncRoles($admin);
        //-----------------------------MATERIAS---------------------------------------
        Permission::create(['name'=>'admin.materias.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materias.destroy'])->syncRoles($admin);
        //-----------------------------ROLES------------------------------------------
        Permission::create(['name'=>'admin.roles.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.permisos'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update_permisos'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.destroy'])->syncRoles($admin);
        //-----------------------------ADMINISTRATIVOS------------------------------------------
        Permission::create(['name'=>'admin.administrativos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.administrativos.destroy'])->syncRoles($admin);
        //-----------------------------DOCENTES------------------------------------------
        Permission::create(['name'=>'admin.docentes.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.docentes.destroy'])->syncRoles($admin);
        //-----------------------------ESTUDIANTES------------------------------------------
        Permission::create(['name'=>'admin.estudiantes.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.estudiantes.destroy'])->syncRoles($admin);
        //-----------------------------LABORATORIOS------------------------------------------
        Permission::create(['name'=>'admin.laboratorios.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.laboratorios.destroy'])->syncRoles($admin);
        //-----------------------------MATERIALES Y EQUIPOS---------------------------------------
        Permission::create(['name'=>'admin.materiales_equipos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materiales_equipos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materiales_equipos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materiales_equipos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materiales_equipos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.materiales_equipos.destroy'])->syncRoles($admin);
        //-----------------------------INSCRIPCIONES----------------------------------------------
        Permission::create(['name'=>'admin.inscripciones.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.pdf_inscripcion'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.inscripciones.destroy'])->syncRoles($admin);
        //--------------------------BUSCAR ESTUDIANTE EN INSCRIPCIONES---------------------------
        Permission::create(['name'=>'admin.inscripciones.buscar_estudiante'])->syncRoles($admin);
        //--------------------------ASIGNACION DE LABORATORIOS PARA ESTUDIANTES------------------
        Permission::create(['name'=>'admin.asignaciones_estudiantes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.asigaciones_estudiantes.destroy'])->syncRoles($admin);
        //--------------------------------CALENDARIO---------------------------------------------
        Permission::create(['name'=>'admin.calendario.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.calendario.eventos'])->syncRoles($admin);
        //--------------------------------GRUPOS ACADEMICOS--------------------------------------
        Permission::create(['name'=>'admin.grupos_academicos.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.buscar_docente'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.grupos_academicos.destroy'])->syncRoles($admin);
        //--------------------------------HORARIOS------------------------------------------------
        Permission::create(['name'=>'admin.horarios.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.buscar_grupo_academico'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.horarios.destroy'])->syncRoles($admin);
        //------------------------------ACTIVIDADES-----------------------------------------------
        Permission::create(['name'=>'admin.actividades.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.actividades.destroy'])->syncRoles($admin);
    }
}
