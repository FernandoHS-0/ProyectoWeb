<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Administrador;

class UserAuth extends Controller
{
    public function userLogin(Request $req){

        $req()->validate([
            'matricula' => 'required',
            'contrasena' => 'required'
        ]);
        
        $sesion = $req->input();
        
        if(strlen($req->input('matricula')) == 9){
            $alumno = Alumno::all();
            foreach ($alumno as $datAl){
                if($datAl->Matricula == $req->input('matricula') && $datAl->Contrasena == $req->input('contrasena')){
                    $req->session()->put('matricula', $sesion['matricula']);
                    if($datAl->Matricula == $datAl->Contrasena){
                        return redirect('cambio_contrasena');
                    }else{
                        return redirect('alumno');
                    }
                    
                }
            }
        }elseif (strlen($req->input('matricula')) == 4) {
            $admin = Administrador::all();
            foreach ($admin as $datosAd){
                if($datosAd->idadministrador == $req->input('matricula') && $datosAd->contrasena == $req->input('contrasena')){
                    $req->session()->put('matricula'. $sesion['matricula']);
                    return redirect('administrador');
                }
            }
        }

    }

    public function cambioContra(Request $nReq){
        if(Alumno::where('Matricula', session('matricula'))->update(['Contrasena' => $nReq->input('confPass')])){
            return redirect('alumno');
        }
    }
}
