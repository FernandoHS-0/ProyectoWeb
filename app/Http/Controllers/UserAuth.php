<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Administrador;

class UserAuth extends Controller
{
    public function userLogin(Request $req){

        /*$req()->validate([
            'matricula' => 'required',
            'contrasena' => 'required'
        ]);*/
        
        $sesion = $req->input();

        
        
        if(strlen($req->input('matricula')) == 9){
            $alumnos = Alumno::where('Matricula', $req->input('matricula'))->where('Contrasena', $req->input('contrasena'))->get();
            $matriculaQ = null;
            $contraQ = null;
            foreach($alumnos as $alumno){
                $matriculaQ = $alumno->Matricula; 
                $contraQ = $alumno->Contrasena;
            }
            if($matriculaQ == $req->input('matricula') && $contraQ == $req->input('contrasena')){
                $req->session()->put('matricula', $sesion['matricula']);
                $req->session()->put('contrasena', $sesion['contrasena']);
                if(session('matricula') == session('contrasena')){
                    return redirect('cambio_contrasena');
                }else{
                    return redirect('alumno');
                }
            }else{
                $error = "La matricula o la contraseña son invalidos";
                return redirect('login');
            }
        }elseif (strlen($req->input('matricula')) == 4) {
            $admin = Administrador::all();
            foreach ($admin as $datosAd){
                if($datosAd->idadministrador == $req->input('matricula') && $datosAd->contrasena == $req->input('contrasena')){
                    $req->session()->put('matricula', $sesion['matricula']);
                    return redirect('administrador');
                }
            }
        }else{
            return redirect('login');
        }

    }

    public function cambioContra(Request $nReq){
        if(Alumno::where('Matricula', session('matricula'))->update(['Contrasena' => $nReq->input('confPass')])){
            return redirect('alumno');
        }
    }
}
