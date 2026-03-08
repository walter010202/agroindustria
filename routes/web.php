<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/admin/configuraciones',[App\Http\Controllers\ConfiguracionController::class,'index'])->name('admin.configuraciones.index')->middleware('auth');
Route::post('/admin/configuraciones/create',[App\Http\Controllers\ConfiguracionController::class,'store'])->name('admin.configuraciones.store')->middleware('auth');
//rutas para semestres
Route::get('/admin/semestres',[App\Http\Controllers\SemestreController::class,'index'])->name('admin.semestres.index')->middleware('auth');
Route::get('/admin/semestres/create',[App\Http\Controllers\SemestreController::class,'create'])->name('admin.semestres.create')->middleware('auth');
Route::post('/admin/semestres/create',[App\Http\Controllers\SemestreController::class,'store'])->name('admin.semestres.store')->middleware('auth');
Route::get('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'show'])->name('admin.semestres.show')->middleware('auth');
Route::get('/admin/semestres/{id}/edit',[App\Http\Controllers\SemestreController::class,'edit'])->name('admin.semestres.edit')->middleware('auth');
Route::put('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'update'])->name('admin.semestres.update')->middleware('auth');
Route::delete('/admin/semestres/{id}',[App\Http\Controllers\SemestreController::class,'destroy'])->name('admin.semestres.destroy')->middleware('auth');
//rutas para periodos
Route::get('/admin/periodos',[App\Http\Controllers\PeriodoController::class,'index'])->name('admin.periodos.index')->middleware('auth');
Route::get('/admin/periodos/create',[App\Http\Controllers\PeriodoController::class,'create'])->name('admin.periodos.create')->middleware('auth');
Route::post('/admin/periodos/create',[App\Http\Controllers\PeriodoController::class,'store'])->name('admin.periodos.store')->middleware('auth');
Route::get('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'show'])->name('admin.periodos.show')->middleware('auth');
Route::get('/admin/periodos/{id}/edit',[App\Http\Controllers\PeriodoController::class,'edit'])->name('admin.periodos.edit')->middleware('auth');
Route::put('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'update'])->name('admin.periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}',[App\Http\Controllers\PeriodoController::class,'destroy'])->name('admin.periodos.destroy')->middleware('auth');
//rutas para materias
Route::get('/admin/materias',[App\Http\Controllers\MateriaController::class,'index'])->name('admin.materias.index')->middleware('auth');
Route::get('/admin/materias/create',[App\Http\Controllers\MateriaController::class,'create'])->name('admin.materias.create')->middleware('auth');
Route::post('/admin/materias/create',[App\Http\Controllers\MateriaController::class,'store'])->name('admin.materias.store')->middleware('auth');
Route::get('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'show'])->name('admin.materias.show')->middleware('auth');
Route::get('/admin/materias/{id}/edit',[App\Http\Controllers\MateriaController::class,'edit'])->name('admin.materias.edit')->middleware('auth');
Route::put('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'update'])->name('admin.materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}',[App\Http\Controllers\MateriaController::class,'destroy'])->name('admin.materias.destroy')->middleware('auth');
//rutas para roles
Route::get('/admin/roles',[App\Http\Controllers\RoleController::class,'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create',[App\Http\Controllers\RoleController::class,'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create',[App\Http\Controllers\RoleController::class,'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'permisos'])->name('admin.roles.permisos')->middleware('auth');
Route::post('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'update_permisos'])->name('admin.roles.update_permisos')->middleware('auth');
Route::get('/admin/roles/{id}/edit',[App\Http\Controllers\RoleController::class,'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}',[App\Http\Controllers\RoleController::class,'destroy'])->name('admin.roles.destroy')->middleware('auth');
//rutas para administrativos
Route::get('/admin/administrativos',[App\Http\Controllers\AdministrativoController::class,'index'])->name('admin.administrativos.index')->middleware('auth');
Route::get('/admin/administrativos/create',[App\Http\Controllers\AdministrativoController::class,'create'])->name('admin.administrativos.create')->middleware('auth');
Route::post('/admin/administrativos/create',[App\Http\Controllers\AdministrativoController::class,'store'])->name('admin.administrativos.store')->middleware('auth');
Route::get('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'show'])->name('admin.administrativos.show')->middleware('auth');
Route::get('/admin/administrativos/{id}/edit',[App\Http\Controllers\AdministrativoController::class,'edit'])->name('admin.administrativos.edit')->middleware('auth');
Route::put('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'update'])->name('admin.administrativos.update')->middleware('auth');
Route::delete('/admin/administrativos/{id}',[App\Http\Controllers\AdministrativoController::class,'destroy'])->name('admin.administrativos.destroy')->middleware('auth');
//rutas para docentes
Route::get('/admin/docentes',[App\Http\Controllers\DocenteController::class,'index'])->name('admin.docentes.index')->middleware('auth');
Route::get('/admin/docentes/create',[App\Http\Controllers\DocenteController::class,'create'])->name('admin.docentes.create')->middleware('auth');
Route::post('/admin/docentes/create',[App\Http\Controllers\DocenteController::class,'store'])->name('admin.docentes.store')->middleware('auth');
Route::get('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'show'])->name('admin.docentes.show')->middleware('auth');
Route::get('/admin/docentes/{id}/edit',[App\Http\Controllers\DocenteController::class,'edit'])->name('admin.docentes.edit')->middleware('auth');
Route::put('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'update'])->name('admin.docentes.update')->middleware('auth');
Route::delete('/admin/docentes/{id}',[App\Http\Controllers\DocenteController::class,'destroy'])->name('admin.docentes.destroy')->middleware('auth');
//rutas para estudiantes
Route::get('/admin/estudiantes',[App\Http\Controllers\EstudianteController::class,'index'])->name('admin.estudiantes.index')->middleware('auth');
Route::get('/admin/estudiantes/create',[App\Http\Controllers\EstudianteController::class,'create'])->name('admin.estudiantes.create')->middleware('auth');
Route::post('/admin/estudiantes/create',[App\Http\Controllers\EstudianteController::class,'store'])->name('admin.estudiantes.store')->middleware('auth');
Route::get('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'show'])->name('admin.estudiantes.show')->middleware('auth');
Route::get('/admin/estudiantes/{id}/edit',[App\Http\Controllers\EstudianteController::class,'edit'])->name('admin.estudiantes.edit')->middleware('auth');
Route::put('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'update'])->name('admin.estudiantes.update')->middleware('auth');
Route::delete('/admin/estudiantes/{id}',[App\Http\Controllers\EstudianteController::class,'destroy'])->name('admin.estudiantes.destroy')->middleware('auth');
//rutas para laboratorios
Route::get('/admin/laboratorios',[App\Http\Controllers\LaboratorioController::class,'index'])->name('admin.laboratorios.index')->middleware('auth');
Route::get('/admin/laboratorios/create',[App\Http\Controllers\LaboratorioController::class,'create'])->name('admin.laboratorios.create')->middleware('auth');
Route::post('/admin/laboratorios/create',[App\Http\Controllers\LaboratorioController::class,'store'])->name('admin.laboratorios.store')->middleware('auth');
Route::get('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'show'])->name('admin.laboratorios.show')->middleware('auth');
Route::get('/admin/laboratorios/{id}/edit',[App\Http\Controllers\LaboratorioController::class,'edit'])->name('admin.laboratorios.edit')->middleware('auth');
Route::put('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'update'])->name('admin.laboratorios.update')->middleware('auth');
Route::delete('/admin/laboratorios/{id}',[App\Http\Controllers\LaboratorioController::class,'destroy'])->name('admin.laboratorios.destroy')->middleware('auth');
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
Route::get('/admin/inscripciones',[App\Http\Controllers\InscripcionController::class,'index'])->name('admin.inscripciones.index')->middleware('auth');
Route::get('/admin/inscripciones/create',[App\Http\Controllers\InscripcionController::class,'create'])->name('admin.inscripciones.create')->middleware('auth');
Route::post('/admin/inscripciones/create',[App\Http\Controllers\InscripcionController::class,'store'])->name('admin.inscripciones.store')->middleware('auth');
Route::get('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'show'])->name('admin.inscripciones.show')->middleware('auth');
Route::get('/admin/inscripciones/pdf/{id}',[App\Http\Controllers\InscripcionController::class,'pdf_inscripcion'])->name('admin.inscripciones.pdf_inscripcion')->middleware('auth');
Route::get('/admin/inscripciones/{id}/edit',[App\Http\Controllers\InscripcionController::class,'edit'])->name('admin.inscripciones.edit')->middleware('auth');
Route::put('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'update'])->name('admin.inscripciones.update')->middleware('auth');
Route::delete('/admin/inscripciones/{id}',[App\Http\Controllers\InscripcionController::class,'destroy'])->name('admin.inscripciones.destroy')->middleware('auth');
//ruta para inscripciones en buscar estudiante
Route::get('/admin/inscripciones/buscar_estudiante/{id}',[App\Http\Controllers\InscripcionController::class,'buscar_estudiante'])->name('admin.inscripciones.buscar_estudiante')->middleware('auth');
//rutas para asignacion de laboratorios para estudiantes
Route::post('/admin/inscripciones/asignaciones_estudiantes/create',[App\Http\Controllers\AsignacionEstudianteController::class,'store'])->name('admin.asignaciones_estudiantes.store')->middleware('auth');
Route::delete('/admin/inscripciones/asignaciones_estudiantes/{id}',[App\Http\Controllers\AsignacionEstudianteController::class,'destroy'])->name('admin.asigaciones_estudiantes.destroy')->middleware('auth');
//Rutas para el calendario 
Route::get('admin/calendario', [App\Http\Controllers\CalendarioController::class, 'index'])->name('admin.calendario.index')->middleware('auth');
Route::get('admin/calendario/eventos', [App\Http\Controllers\CalendarioController::class, 'eventos'])->name('admin.calendario.eventos')->middleware('auth');
//Rutas para los grupos academicos del docente
//rutas para grupos académicos
Route::get('/admin/grupos_academicos',[App\Http\Controllers\GruposAcademicoController::class,'index'])->name('admin.grupos_academicos.index')->middleware('auth');
Route::get('/admin/grupos_academicos/create',[App\Http\Controllers\GruposAcademicoController::class,'create'])->name('admin.grupos_academicos.create')->middleware('auth');
Route::get('/admin/grupos_academicos/buscar_docente/{id}',[App\Http\Controllers\GruposAcademicoController::class,'buscar_docente'])->name('admin.grupos_academicos.buscar_docente')->middleware('auth');
Route::post('/admin/grupos_academicos/create',[App\Http\Controllers\GruposAcademicoController::class,'store'])->name('admin.grupos_academicos.store')->middleware('auth');
Route::get('/admin/grupos_academicos/{id}/edit',[App\Http\Controllers\GruposAcademicoController::class,'edit'])->name('admin.grupos_academicos.edit')->middleware('auth');
Route::put('/admin/grupos_academicos/{id}',[App\Http\Controllers\GruposAcademicoController::class,'update'])->name('admin.grupos_academicos.update')->middleware('auth');
Route::delete('/admin/grupos_academicos/{id}',[App\Http\Controllers\GruposAcademicoController::class,'destroy'])->name('admin.grupos_academicos.destroy')->middleware('auth');
//Rutas para horarios
Route::get('/admin/horarios',[App\Http\Controllers\HorarioController::class,'index'])->name('admin.horarios.index')->middleware('auth');
Route::get('/admin/horarios/create',[App\Http\Controllers\HorarioController::class,'create'])->name('admin.horarios.create')->middleware('auth');
Route::get('/admin/horarios/buscar_grupo_academico/{id}',[App\Http\Controllers\HorarioController::class,'buscar_grupo_academico'])->name('admin.horarios.buscar_grupo_academico')->middleware('auth');
Route::post('/admin/horarios/create',[App\Http\Controllers\HorarioController::class,'store'])->name('admin.horarios.store')->middleware('auth');
Route::get('/admin/horarios/{id}/edit',[App\Http\Controllers\HorarioController::class,'edit'])->name('admin.horarios.edit')->middleware('auth');
Route::put('/admin/horarios/{id}',[App\Http\Controllers\HorarioController::class,'update'])->name('admin.horarios.update')->middleware('auth');
Route::delete('/admin/horarios/{id}',[App\Http\Controllers\HorarioController::class,'destroy'])->name('admin.horarios.destroy')->middleware('auth');
//rutas para actividades y observaciones que se realizan en las prácticas de laboratorios
Route::get('/admin/actividades',[App\Http\Controllers\ActividadController::class,'index'])->name('admin.actividades.index')->middleware('auth');
Route::get('/admin/actividades/create',[App\Http\Controllers\ActividadController::class,'create'])->name('admin.actividades.create')->middleware('auth');
Route::post('/admin/actividades/create',[App\Http\Controllers\ActividadController::class,'store'])->name('admin.actividades.store')->middleware('auth');
Route::get('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'show'])->name('admin.actividades.show')->middleware('auth');
Route::get('/admin/actividades/{id}/edit',[App\Http\Controllers\ActividadController::class,'edit'])->name('admin.actividades.edit')->middleware('auth');
Route::put('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'update'])->name('admin.actividades.update')->middleware('auth');
Route::delete('/admin/actividades/{id}',[App\Http\Controllers\ActividadController::class,'destroy'])->name('admin.actividades.destroy')->middleware('auth');
//Ruta para cerrar sesion
Route::post('/logout', function (Request $request) {Auth::logout(); $request->session()->invalidate(); $request->session()->regenerateToken(); return redirect('/login');})->name('logout');
