<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\ControlMateria;

class homeAlumnoController extends Controller
{
    public function index()
    {
        $alumno = Alumno::where('idAlumno', 203)->get();
        return view('homeAlumno', compact('alumno'));
    }

    public function cursadas()
    {
        $materias = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')
                                    ->select('materias.Nombre', 'materias.Nivel', 'materias.Area', 'materias.Creditos')
                                    ->where('idAlumno', 203)->where('estado', 'Finalizado')->get();
        return view('materiasCursadas', compact('materias'));
    }

    public function mapaAlumno()
    {
        return view('mapaAlumno');
    }

    public function enCurso()
    {
        $materias1 = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')
                                      ->select('materias.Nombre', 'materias.Nivel', 'materias.Area', 'materias.Creditos')
                                      ->where('idAlumno', 203)->where('estado', 'En curso')->get();
        return view('enCurso', compact('materias1'));
    }

    public function proyeccion()
    {
        return view('proyeccion');
    }
}
