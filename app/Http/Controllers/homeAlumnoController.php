<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use \Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\ControlMateria;
use App\Models\Materia;
use App\Models\PreRequisitos;

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
        return view('enCurso');
    }

    public function proyeccion()
    {
        $ambas = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')->join('alumnos', 'control_materias.idAlumno', '=', 'alumnos.idAlumno')
                                    ->join('pre_requisitos', 'materias.idmaterias', '=', 'pre_requisitos.idmaterias')
                                    ->select('materias.idmaterias')
                                    ->where('alumnos.idAlumno', 211)->where('control_materias.Estado', '!=', 'Pendiente')->get();
        $enCurso = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')->join('alumnos', 'control_materias.idAlumno', '=', 'alumnos.idAlumno')
                                    ->join('pre_requisitos', 'materias.idmaterias', '=', 'pre_requisitos.idmaterias')
                                    ->select('materias.idmaterias', 'control_materias.Estado', 'materias.Periodo')
                                    ->where('alumnos.idAlumno', 211)->where('control_materias.Estado', 'En curso')->get();
        
        foreach ($enCurso as $mat) {
            $sigSem = Materia::select('Nombre', 'idmaterias', 'Periodo')->where('Periodo', $mat->Periodo + 1)->get();    
        }

        $preReq = [];

        

        $fCol = new Collection();
        foreach ($sigSem as $sigMat){
            $items = DB::select(DB::raw('SELECT idRequisito, idmaterias, preRequisito FROM pre_requisitos WHERE idmaterias = "'.$sigMat->idmaterias.'";'));
            foreach ($items as $item){
                $fCol->push($items);
            }
        }
        $fCol->toJson();
        $jReq = json_decode($fCol);
//$fCol->push(PreRequisitos::select('idmaterias', 'preRequisito')->where('idmaterias', $sigMat->idmaterias)->get());
//array_push($preReq, PreRequisitos::select('idmaterias', 'preRequisito')->where('idmaterias', $sigMat->idmaterias)->get());
        $listM = [];
        foreach ($jReq as $key => $element){
            foreach($element as $campo){
                foreach ($ambas as $todas){
                    if($todas->idmaterias == $campo->preRequisito){
                        array_push($listM, $campo->idmaterias);
                         
                    }
                }
            }
        }

        $colMat = new Collection();
        for ($i=0; $i < sizeof($listM); $i++) { 
            $matProy = DB::select(DB::raw('SELECT idmaterias, nombre, nivel, creditos, area FROM materias WHERE idmaterias = "'.$listM[$i].'";'));
            foreach ($matProy as $valMat => $value) {
               $colMat->push($value);
            }
        }
        $colMat->toJson();
        $colMat = json_decode($colMat);
//dd($colMat);
        return view('proyeccion', compact('colMat'));
    }
}
