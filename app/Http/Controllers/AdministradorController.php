<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function inicioAdmin()
    {
        //$alumno = Alumno::where('idAlumno', 203)->get();
        return view('inicioAdmin');
    }

    public function datosAlumno()
    {
        return view('datosAlumno');
    }
}
