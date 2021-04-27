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
        #infoAl{
            padding-top: 6%;
        }
        #btnLo{
            margin-left: 32%;
            background-color: rgb(0, 181, 226);
        }
    </style>
    <h3 id="titPerf">Perfil</h3>
    <div id="bloque1" class="z-depth-3">
        <div class="row">
            <div class="col s9" id="infoAl">
                @foreach ($alumno as $datos)
                    <h5 class="center-align white-text condensed light">Hola, {{$datos->Nombre}} {{$datos->ApellidoPaterno}} {{$datos->ApellidoMaterno}}</h5>
                    <br><h5 class="center-align white-text thin">{{$datos->Matricula}}</h5>
                    <br><h5 class="center-align white-text condensed light">Ingeniería en tecnologías de la información (Ciudad Universitaria)</h5>
                    <br><h5 class="center-align white-text condensed light">Tu promedio</h5>
                    <h3 class="center-align white-text thin">8.64</h3>
                @endforeach
            </div>
            <div class="col s3">
                <img class="responsive-img" src="{{asset('storage/images/logoPartidoBlanco.png')}}" id="logoUsr">
            </div>
            <div class="col s12">
                <a class="waves-effect waves-light btn" href="http://localhost/codigos/Proyecto/blog/public/logOut" id="btnLo">Cerrar sesión</a>
            </div>
        </div>
    </div>
@endsection