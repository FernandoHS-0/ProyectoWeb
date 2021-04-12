@extends('layouts.alumnoPlantilla')
@section('titulo', 'Inicio')
@section('cuerpo')
    <style>
        #bloque1{
            width: 80%;
            margin-top: 10px;
            margin-right: 10%;
            margin-left: 10%;
            background-color: rgb(0, 59, 92);
            padding-top: 20px;
            padding-bottom: 20px; 
        }
        #logoUsr{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        #titPerf{
            margin-left: 20px;
        }
    </style>
    <div id="bloque1" class="z-depth-3">
        <h3 class="white-text" id="titPerf">Perfil</h3>
            <div class="row">
                <div class="col s4">
                    <img class="responsive-img" src="{{asset('storage/images/usuario2.png')}}" id="logoUsr">
                  </div>
                  <div class="col s8">
                    <h4 class="center-align white-text">Hola, Hernández Sánchez Luis Fernando</h4>
                    <h4 class="center-align white-text">201842437</h4>
                    <h4 class="center-align white-text">Ingeniería en tecnologías de la información</h4>
                    <h4 class="center-align white-text">Tu promedio: 8.62</h4>
                  </div>
            </div>
    </div>
@endsection