<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeAlumnoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UserAuth;
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
    return redirect('/login');
});

Route::get('/login', function () {

    if(session()->has('matricula')){
        if(strlen(session('matricula')) == 9){
            return redirect('alumno');
        }elseif (strlen(session('matricula')) == 4) {
            return redirect('administrador');
        }
    }else{
        return view('/login');
    }
    
});

Route::view('login', 'login');
Route::view('cambio_contrasena', 'chgPsswd');

Route::get('/logOut', function () {
    if(session()->has('matricula')){
        session()->pull('matricula');
    }
    return redirect('/login');
});

Route::get('alumno', [homeAlumnoController::class, 'index']) -> name('inicioAlumno');
Route::get('alumno/cursadas', [homeAlumnoController::class, 'cursadas']) -> name('matCurs');
Route::get('alumno/mapaAlumno', [homeAlumnoController::class, 'mapaAlumno']) -> name('mapaAl');
Route::get('alumno/enCurso', [homeAlumnoController::class, 'enCurso']) -> name('enCurso');
Route::get('alumno/proyeccion', [homeAlumnoController::class, 'proyeccion']) -> name('proyAl');


Route::get('administrador', [AdministradorController::class, 'inicioAdmin']) -> name('inicioAdmin');
Route::get('administrador/datos_alumno', [AdministradorController::class, 'datosAlumno']) -> name('datosAl');
Route::get('administrador/proyecciones', [AdministradorController::class, 'verProyecciones']) -> name('proyec');


Route::post('/verInfo', [AdministradorController::class, 'obtenerDatos']) -> name('obt');
Route::post('/verProyeccion', [AdministradorController::class, 'obtenerDatosProyecion']) -> name('obtP');

Route::post('user', [UserAuth::class,'userLogin']);

Route::post('cambio', [UserAuth::class, 'cambioContra']);

