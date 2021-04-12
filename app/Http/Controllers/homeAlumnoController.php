<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeAlumnoController extends Controller
{
    public function index()
    {
        return view('homeAlumno');
    }
}
