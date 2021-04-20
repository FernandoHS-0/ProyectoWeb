<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{

    public function obtenerDatos(Request $re){
        $mat=$re->matricula;
        $alumno = Alumno::where('Matricula', $mat)->get();
        return response(json_encode($alumno));
    }
    public function inicioAdmin()
    {
        //$alumno = Alumno::where('idAlumno', 203)->get();
        return view('inicioAdmin');
    }
    public function datosAlumno()
    {
        $alumnos=Alumno::all();
        return view('datosAlumno',compact('alumnos'));
    }

}
