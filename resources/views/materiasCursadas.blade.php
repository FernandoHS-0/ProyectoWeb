@extends('layouts.alumnoPlantilla')
@section('titulo', 'Materias cursadas')
@section('cuerpo')
    <style>
        #titPag{
            margin-left: 5%;
        }
    </style>
    <h3 id="titPag">Materias cursadas</h3>
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
            @foreach ($materias as $item)
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