@extends('layouts.alumnoPlantilla')
@section('titulo', 'Materias en curso')
@section('cuerpo')
  <style>
    #curso{
        margin-left: 2%;
    }
  </style>
  <h3 id="curso">Materias en curso</h3>
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
        @foreach ($materias1 as $curso1)
        <tr>
            <td>{{$curso1->Nombre}}</td>
            <td>{{$curso1->Nivel}}</td>
            <td>{{$curso1->Area}}</td>
            <td>{{$curso1->Creditos}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
