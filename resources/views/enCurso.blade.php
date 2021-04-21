@extends('layouts.alumnoPlantilla')
@section('titulo', 'Materias en curso')
@section('cuerpo')
<style>
    #titPag{
        margin-left: 5%;
    }
    #footer1{
          background-color: rgb(0, 59, 92);
          position: absolute;
          clear: round($number: 0);
          left:0px;
          bottom:0px;
          width:100%;
    }
</style>
<h3 id="titPag">Materias en curso</h3>
<table class="highlight centered responsive-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nivel</th>
            <th>Área</th>
            <th>Creditos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cursando as $item)
        <tr>
            <td>{{$item->Nombre}}</td>
            <td>{{$item->Nivel}}</td>
            <td>{{$item->Area}}</td>
            <td>{{$item->Creditos}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection