<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeAlumnoController;
use App\Http\Controllers\AdministradorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('alumno', [homeAlumnoController::class, 'index']) -> name('inicioAlumno');
Route::get('alumno/cursadas', [homeAlumnoController::class, 'cursadas']) -> name('matCurs');
Route::get('alumno/mapaAlumno', [homeAlumnoController::class, 'mapaAlumno']) -> name('mapaAl');
Route::get('alumno/enCurso', [homeAlumnoController::class, 'enCurso']) -> name('enCurso');
Route::get('alumno/proyeccion', [homeAlumnoController::class, 'proyeccion']) -> name('mapaAl');


Route::get('administrador', [AdministradorController::class, 'inicioAdmin']) -> name('inicioAdmin');
Route::get('administrador/datos_alumno', [AdministradorController::class, 'datosAlumno']) -> name('datosAl');


