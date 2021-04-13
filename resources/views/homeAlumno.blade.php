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
            width: 100%;
        }
        #titPerf{
            margin-left: 5%;
        }
    </style>
    <h3 id="titPerf">Perfil</h3>
    <div id="bloque1" class="z-depth-3 hoverable">
        <div class="row">
            <div class="col s9">
                <h4 class="center-align white-text">Hola, Hernández Sánchez Luis Fernando</h4>
                <h4 class="center-align white-text">201842437</h4>
                <h4 class="center-align white-text">Ingeniería en tecnologías de la información</h4>
                <h4 class="center-align white-text">Tu promedio: 8.62</h4>
            </div>
            <div class="col s3">
                <img class="responsive-img" src="{{asset('storage/images/logoPartidoBlanco.png')}}" id="logoUsr">
            </div>
        </div>
    </div>
@endsection