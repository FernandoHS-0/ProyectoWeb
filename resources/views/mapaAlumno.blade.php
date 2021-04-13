@extends('layouts.alumnoPlantilla')
@section('titulo', 'Mapa gráfico')
@section('cuerpo')
    <style>
        #titulo{
            margin-left: 5%;
        }
    </style>
    <h3 id="titulo">Mapa gráfico</h3>
    <embed src="https://secreacademica.cs.buap.mx/MumMapas/Semestres/Mapas_Carreras_ITI_v2802.pdf" type="application/pdf" width="80%" height="600px" class="centrar"/>
@endsection