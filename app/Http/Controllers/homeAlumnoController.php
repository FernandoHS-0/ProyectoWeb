<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeAlumnoController extends Controller
{
    public function index()
    {
        return view('homeAlumno');
    }

    public function cursadas()
    {
        return view('materiasCursadas');
    }

    public function mapaAlumno()
    {
        return view('mapaAlumno');
    }
}
