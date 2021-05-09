<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Alumno;
use Illuminate\Http\Request;
use App\Models\ControlMateria;
use Illuminate\Support\Collection;
use App\Models\Materia;
use \Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class AdministradorController extends Controller
{

    public function obtenerDatos(Request $re){
        $mat=$re->matricula;
        $alumno = Alumno::where('Matricula', $mat)->get();

        foreach($alumno as $al){
            $idAl = $al->idAlumno;
        }

        $avance = DB::select(DB::raw('SELECT count(idMaterias) AS numMat FROM control_materias WHERE idAlumno = '.$idAl.' AND estado = "Finalizado"'));
        
        foreach($avance as $av){
            $prog = ($av->numMat * 100)/42;
        }
        $prog = bcdiv($prog, '1', 2);

        $variables = array('alumno' => "$alumno",
                           'prog' => "$prog");

        return response(json_encode($variables));
    }
 
    public function obtenerDatosProyecion(Request $re){
        /**Obtenemos la matricula*/
        $mat=$re->matricula;
        $id = Alumno::where('Matricula', $mat)->get('idAlumno');
        $idM="";
        foreach ($id as $item){
            /**Obtenemos el id del alumno*/
            $idM=$item->idAlumno;
         }
        $ambas = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')->join('alumnos', 'control_materias.idAlumno', '=', 'alumnos.idAlumno')
                                    ->join('pre_requisitos', 'materias.idmaterias', '=', 'pre_requisitos.idmaterias')
                                    ->select('materias.idmaterias')
                                    ->where('alumnos.idAlumno', $idM)->where('control_materias.Estado', '!=', 'Pendiente')->get();
        $enCurso = ControlMateria::join('materias', 'control_materias.idmaterias', '=', 'materias.idmaterias')->join('alumnos', 'control_materias.idAlumno', '=', 'alumnos.idAlumno')
                                    ->join('pre_requisitos', 'materias.idmaterias', '=', 'pre_requisitos.idmaterias')
                                    ->select('materias.idmaterias', 'control_materias.Estado', 'materias.Periodo')
                                    ->where('alumnos.idAlumno', $idM)->where('control_materias.Estado', 'En curso')->get();
        
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
        return response(json_encode($colMat));
    }

    public function verProyecciones(){
        $alumnos=Alumno::all();
        return view('proyecciones',compact('alumnos'));
    }
    public function inicioAdmin()
    {
        $admn = Administrador::where('idadministrador', session('matricula'))->get();
        return view('inicioAdmin', compact('admn'));
    }
    public function datosAlumno()
    {
        $alumnos=Alumno::all();
        return view('datosAlumno',compact('alumnos'));
    }

}
