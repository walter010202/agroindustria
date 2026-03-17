<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

//Route::get('/register', function(){
//    abort(403, 'registro no permitido');// O redirigir a otra Ruta
//})->name('register');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');
//Rutas de Configuraciones
Route::get('/admin/configuraciones',[App\Http\Controllers\ConfiguracionController::class,'index'])->name('admin.configuraciones.index')->middleware('auth','can:admin.configuraciones.index');
Route::post('/admin/configuraciones/create',[App\Http\Controllers\ConfiguracionController::class,'store'])->name('admin.configuraciones.store')->middleware('auth','can:admin.configuraciones.store');
//rutas para semestres
Route::get('/admin/semestres',[App\Http\Controllers\SemestreController::class,'index'])->name('admin.semestres.index')->middleware('auth','can:admin.semestres.index');
Route::get('/admin/semestres/create',[App\Http\Controllers\SemestreController::class,'create'])->name('admin.semestres.create')->middleware('auth','can:admin.semestres.create');
Route::post('/admin/semestres/create',[App\Http\Controllers\SemestreController::class,'store'])->name('admin.semestres.store')->middleware('auth','can:admin.semestres.store');
Route::get('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'show'])->name('admin.semestres.show')->middleware('auth','can:admin.semestres.show');
Route::get('/admin/semestres/{id}/edit',[App\Http\Controllers\SemestreController::class,'edit'])->name('admin.semestres.edit')->middleware('auth','can:admin.semestres.edit');
Route::put('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'update'])->name('admin.semestres.update')->middleware('auth','can:admin.semestres.update');
Route::delete('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'destroy'])->name('admin.semestres.destroy')->middleware('auth','can:admin.semestres.destroy');
//rutas para periodos
Route::get('/admin/periodos',[App\Http\Controllers\PeriodoController::class,'index'])->name('admin.periodos.index')->middleware('auth','can:admin.periodos.index');
Route::get('/admin/periodos/create',[App\Http\Controllers\PeriodoController::class,'create'])->name('admin.periodos.create')->middleware('auth','can:admin.periodos.create');
Route::post('/admin/periodos/create',[App\Http\Controllers\PeriodoController::class,'store'])->name('admin.periodos.store')->middleware('auth','can:admin.periodos.store');
Route::get('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'show'])->name('admin.periodos.show')->middleware('auth','can:admin.periodos.show');
Route::get('/admin/periodos/{id}/edit',[App\Http\Controllers\PeriodoController::class,'edit'])->name('admin.periodos.edit')->middleware('auth','can:admin.periodos.edit');
Route::put('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'update'])->name('admin.periodos.update')->middleware('auth','can:admin.periodos.update');
Route::delete('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'destroy'])->name('admin.periodos.destroy')->middleware('auth','can:admin.periodos.destroy');
//rutas para materias
Route::get('/admin/materias',[App\Http\Controllers\MateriaController::class,'index'])->name('admin.materias.index')->middleware('auth','can:admin.materias.index');
Route::get('/admin/materias/create',[App\Http\Controllers\MateriaController::class,'create'])->name('admin.materias.create')->middleware('auth','can:admin.materias.create');
Route::post('/admin/materias/create',[App\Http\Controllers\MateriaController::class,'store'])->name('admin.materias.store')->middleware('auth','can:admin.materias.store');
Route::get('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'show'])->name('admin.materias.show')->middleware('auth','can:admin.materias.show');
Route::get('/admin/materias/{id}/edit',[App\Http\Controllers\MateriaController::class,'edit'])->name('admin.materias.edit')->middleware('auth','can:admin.materias.edit');
Route::put('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'update'])->name('admin.materias.update')->middleware('auth','can:admin.materias.update');
Route::delete('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'destroy'])->name('admin.materias.destroy')->middleware('auth','can:admin.materias.destroy');
//rutas para roles
Route::get('/admin/roles',[App\Http\Controllers\RoleController::class,'index'])->name('admin.roles.index')->middleware('auth','can:admin.roles.index');
Route::get('/admin/roles/create',[App\Http\Controllers\RoleController::class,'create'])->name('admin.roles.create')->middleware('auth','can:admin.roles.create');
Route::post('/admin/roles/create',[App\Http\Controllers\RoleController::class,'store'])->name('admin.roles.store')->middleware('auth','can:admin.roles.store');
Route::get('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'permisos'])->name('admin.roles.permisos')->middleware('auth','can:admin.roles.permisos');
Route::post('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'update_permisos'])->name('admin.roles.update_permisos')->middleware('auth','can:admin.roles.update_permisos');
Route::get('/admin/roles/{id}/edit',[App\Http\Controllers\RoleController::class,'edit'])->name('admin.roles.edit')->middleware('auth','can:admin.roles.edit');
Route::put('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'update'])->name('admin.roles.update')->middleware('auth','can:admin.roles.update');
Route::delete('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'destroy'])->name('admin.roles.destroy')->middleware('auth','can:admin.roles.destroy');
//rutas para administrativos
Route::get('/admin/administrativos',[App\Http\Controllers\AdministrativoController::class,'index'])->name('admin.administrativos.index')->middleware('auth','can:admin.administrativos.index');
Route::get('/admin/administrativos/create',[App\Http\Controllers\AdministrativoController::class,'create'])->name('admin.administrativos.create')->middleware('auth','can:admin.administrativos.create');
Route::post('/admin/administrativos/create',[App\Http\Controllers\AdministrativoController::class,'store'])->name('admin.administrativos.store')->middleware('auth','can:admin.administrativos.store');
Route::get('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'show'])->name('admin.administrativos.show')->middleware('auth','can:admin.administrativos.show');
Route::get('/admin/administrativos/{id}/edit',[App\Http\Controllers\AdministrativoController::class,'edit'])->name('admin.administrativos.edit')->middleware('auth','can:admin.administrativos.edit');
Route::put('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'update'])->name('admin.administrativos.update')->middleware('auth','can:admin.administrativos.update');
Route::delete('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'destroy'])->name('admin.administrativos.destroy')->middleware('auth','can:admin.administrativos.destroy');
//rutas para docentes
Route::get('/admin/docentes',[App\Http\Controllers\DocenteController::class,'index'])->name('admin.docentes.index')->middleware('auth','can:admin.docentes.index');
Route::get('/admin/docentes/create',[App\Http\Controllers\DocenteController::class,'create'])->name('admin.docentes.create')->middleware('auth','can:admin.docentes.create');
Route::post('/admin/docentes/create',[App\Http\Controllers\DocenteController::class,'store'])->name('admin.docentes.store')->middleware('auth','can:admin.docentes.store');
Route::get('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'show'])->name('admin.docentes.show')->middleware('auth','can:admin.docentes.show');
Route::get('/admin/docentes/{id}/edit',[App\Http\Controllers\DocenteController::class,'edit'])->name('admin.docentes.edit')->middleware('auth','can:admin.docentes.edit');
Route::put('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'update'])->name('admin.docentes.update')->middleware('auth','can:admin.docentes.update');
Route::delete('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'destroy'])->name('admin.docentes.destroy')->middleware('auth','can:admin.docentes.destroy');
//rutas para estudiantes
Route::get('/admin/estudiantes',[App\Http\Controllers\EstudianteController::class,'index'])->name('admin.estudiantes.index')->middleware('auth','can:admin.estudiantes.index');
Route::get('/admin/estudiantes/create',[App\Http\Controllers\EstudianteController::class,'create'])->name('admin.estudiantes.create')->middleware('auth','can:admin.estudiantes.create');
Route::post('/admin/estudiantes/create',[App\Http\Controllers\EstudianteController::class,'store'])->name('admin.estudiantes.store')->middleware('auth','can:admin.estudiantes.store');
Route::get('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'show'])->name('admin.estudiantes.show')->middleware('auth','can:admin.estudiantes.show');
Route::get('/admin/estudiantes/{id}/edit',[App\Http\Controllers\EstudianteController::class,'edit'])->name('admin.estudiantes.edit')->middleware('auth','can:admin.estudiantes.edit');
Route::put('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'update'])->name('admin.estudiantes.update')->middleware('auth','can:admin.estudiantes.update');
Route::delete('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'destroy'])->name('admin.estudiantes.destroy')->middleware('auth','can:admin.estudiantes.destroy');
//rutas para laboratorios
Route::get('/admin/laboratorios',[App\Http\Controllers\LaboratorioController::class,'index'])->name('admin.laboratorios.index')->middleware('auth','can:admin.laboratorios.index');
Route::get('/admin/laboratorios/create',[App\Http\Controllers\LaboratorioController::class,'create'])->name('admin.laboratorios.create')->middleware('auth','can:admin.laboratorios.create');
Route::post('/admin/laboratorios/create',[App\Http\Controllers\LaboratorioController::class,'store'])->name('admin.laboratorios.store')->middleware('auth','can:admin.laboratorios.store');
Route::get('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'show'])->name('admin.laboratorios.show')->middleware('auth','can:admin.laboratorios.show');
Route::get('/admin/laboratorios/{id}/edit',[App\Http\Controllers\LaboratorioController::class,'edit'])->name('admin.laboratorios.edit')->middleware('auth','can:admin.laboratorios.edit');
Route::put('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'update'])->name('admin.laboratorios.update')->middleware('auth','can:admin.laboratorios.update');
Route::delete('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'destroy'])->name('admin.laboratorios.destroy')->middleware('auth','can:admin.laboratorios.destroy');
//rutas para materiales y equipos dentro de la ruta de laboratorios
Route::prefix('admin')->middleware('auth')->group(function () {
Route::resource('laboratorios', App\Http\Controllers\LaboratorioController::class);
Route::get('laboratorios/{laboratorio}/materiales-equipos',[App\Http\Controllers\MaterialesEquipoController::class, 'index'])->name('admin.materiales_equipos.index');
Route::get('laboratorios/{laboratorio}/materiales-equipos/create',[App\Http\Controllers\MaterialesEquipoController::class, 'create'])->name('admin.materiales_equipos.create');
Route::post('laboratorios/{laboratorio}/materiales-equipos',[App\Http\Controllers\MaterialesEquipoController::class, 'store'])->name('admin.materiales_equipos.store');
Route::get('laboratorios/{laboratorio}/materiales-equipos/{material}/edit',[App\Http\Controllers\MaterialesEquipoController::class, 'edit'])->name('admin.materiales_equipos.edit');
Route::put('laboratorios/{laboratorio}/materiales-equipos/{material}',[App\Http\Controllers\MaterialesEquipoController::class, 'update'])->name('admin.materiales_equipos.update');
Route::delete('laboratorios/{laboratorio}/materiales-equipos/{material}',[App\Http\Controllers\MaterialesEquipoController::class, 'destroy'])->name('admin.materiales_equipos.destroy');
});
//rutas para Inscripciones
Route::get('/admin/inscripciones',[App\Http\Controllers\InscripcionController::class,'index'])->name('admin.inscripciones.index')->middleware('auth','can:admin.inscripciones.index');
Route::get('/admin/inscripciones/create',[App\Http\Controllers\InscripcionController::class,'create'])->name('admin.inscripciones.create')->middleware('auth','can:admin.inscripciones.create');
Route::post('/admin/inscripciones/create',[App\Http\Controllers\InscripcionController::class,'store'])->name('admin.inscripciones.store')->middleware('auth','can:admin.inscripciones.store');
Route::get('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'show'])->name('admin.inscripciones.show')->middleware('auth','can:admin.inscripciones.show');
Route::get('/admin/inscripciones/pdf/{id}',[App\Http\Controllers\InscripcionController::class,'pdf_inscripcion'])->name('admin.inscripciones.pdf_inscripcion')->middleware('auth','can:admin.inscripciones.pdf_inscripcion');
Route::get('/admin/inscripciones/{id}/edit',[App\Http\Controllers\InscripcionController::class,'edit'])->name('admin.inscripciones.edit')->middleware('auth','can:admin.inscripciones.edit');
Route::put('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'update'])->name('admin.inscripciones.update')->middleware('auth','can:admin.inscripciones.update');
Route::delete('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'destroy'])->name('admin.inscripciones.destroy')->middleware('auth','can:admin.inscripciones.destroy');
//ruta para inscripciones en buscar estudiante
Route::get('/admin/inscripciones/buscar_estudiante/{id}',[App\Http\Controllers\InscripcionController::class,'buscar_estudiante'])->name('admin.inscripciones.buscar_estudiante')->middleware('auth','can:admin.inscripciones.buscar_estudiante');
//rutas para asignacion de laboratorios para estudiantes
Route::post('/admin/inscripciones/asignaciones_estudiantes/create',[App\Http\Controllers\AsignacionEstudianteController::class,'store'])->name('admin.asignaciones_estudiantes.store')->middleware('auth','can:admin.asignaciones_estudiantes.store');
Route::delete('/admin/inscripciones/asignaciones_estudiantes/{id}',[App\Http\Controllers\AsignacionEstudianteController::class,'destroy'])->name('admin.asigaciones_estudiantes.destroy')->middleware('auth','can:admin.asigaciones_estudiantes.destroy');
//Rutas para el calendario 
Route::get('admin/calendario', [App\Http\Controllers\CalendarioController::class, 'index'])->name('admin.calendario.index')->middleware('auth','can:admin.calendario.index');
Route::get('admin/calendario/eventos', [App\Http\Controllers\CalendarioController::class, 'eventos'])->name('admin.calendario.eventos')->middleware('auth','can:admin.calendario.eventos');
//Rutas para los grupos academicos del docente
//rutas para grupos académicos
Route::get('/admin/grupos_academicos',[App\Http\Controllers\GruposAcademicoController::class,'index'])->name('admin.grupos_academicos.index')->middleware('auth','can:admin.grupos_academicos.index');
Route::get('/admin/grupos_academicos/create',[App\Http\Controllers\GruposAcademicoController::class,'create'])->name('admin.grupos_academicos.create')->middleware('auth','can:admin.grupos_academicos.create');
Route::get('/admin/grupos_academicos/buscar_docente/{id}',[App\Http\Controllers\GruposAcademicoController::class,'buscar_docente'])->name('admin.grupos_academicos.buscar_docente')->middleware('auth','can:admin.grupos_academicos.buscar_docente');
Route::post('/admin/grupos_academicos/create',[App\Http\Controllers\GruposAcademicoController::class,'store'])->name('admin.grupos_academicos.store')->middleware('auth','can:admin.grupos_academicos.store');
Route::get('/admin/grupos_academicos/{id}/edit',[App\Http\Controllers\GruposAcademicoController::class,'edit'])->name('admin.grupos_academicos.edit')->middleware('auth','can:admin.grupos_academicos.edit');
Route::put('/admin/grupos_academicos/{id}',[App\Http\Controllers\GruposAcademicoController::class,'update'])->name('admin.grupos_academicos.update')->middleware('auth','can:admin.grupos_academicos.update');
Route::delete('/admin/grupos_academicos/{id}',[App\Http\Controllers\GruposAcademicoController::class,'destroy'])->name('admin.grupos_academicos.destroy')->middleware('auth','can:admin.grupos_academicos.destroy');
//Rutas para horarios
Route::get('/admin/horarios',[App\Http\Controllers\HorarioController::class,'index'])->name('admin.horarios.index')->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create',[App\Http\Controllers\HorarioController::class,'create'])->name('admin.horarios.create')->middleware('auth','can:admin.horarios.create');
Route::get('/admin/horarios/buscar_grupo_academico/{id}',[App\Http\Controllers\HorarioController::class,'buscar_grupo_academico'])->name('admin.horarios.buscar_grupo_academico')->middleware('auth','can:admin.horarios.buscar_grupo_academico');
Route::post('/admin/horarios/create',[App\Http\Controllers\HorarioController::class,'store'])->name('admin.horarios.store')->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}/edit',[App\Http\Controllers\HorarioController::class,'edit'])->name('admin.horarios.edit')->middleware('auth','can:admin.horarios.edit');
Route::put('/admin/horarios/{id}',[App\Http\Controllers\HorarioController::class,'update'])->name('admin.horarios.update')->middleware('auth','can:admin.horarios.update');
Route::delete('/admin/horarios/{id}',[App\Http\Controllers\HorarioController::class,'destroy'])->name('admin.horarios.destroy')->middleware('auth','can:admin.horarios.destroy');
//rutas para actividades y observaciones que se realizan en las prácticas de laboratorios
Route::get('/admin/actividades',[App\Http\Controllers\ActividadController::class,'index'])->name('admin.actividades.index')->middleware('auth','can:admin.actividades.index');
Route::get('/admin/actividades/create',[App\Http\Controllers\ActividadController::class,'create'])->name('admin.actividades.create')->middleware('auth','can:admin.actividades.create');
Route::post('/admin/actividades/create',[App\Http\Controllers\ActividadController::class,'store'])->name('admin.actividades.store')->middleware('auth','can:admin.actividades.store');
Route::get('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'show'])->name('admin.actividades.show')->middleware('auth','can:admin.actividades.show');
Route::get('/admin/actividades/{id}/edit',[App\Http\Controllers\ActividadController::class,'edit'])->name('admin.actividades.edit')->middleware('auth','can:admin.actividades.edit');
Route::put('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'update'])->name('admin.actividades.update')->middleware('auth','can:admin.actividades.update');
Route::delete('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'destroy'])->name('admin.actividades.destroy')->middleware('auth','can:admin.actividades.destroy');
//Ruta para cerrar sesion
Route::post('/logout', function (Request $request) {Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect('/login');})->name('logout');
