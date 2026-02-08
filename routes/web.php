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
