@extends('layouts.alumnoPlantilla')
@section('titulo', 'Proyeccion')
@section('cuerpo')
<style>
    #titPag{
        margin-left: 5%;
        display: inline-block;
    }
    #btnModal{
        display: inline-block;
        margin-left: 1%;
        margin-bottom: 1%;
        background-color: rgb(0, 181, 226);
    }

    .waves-effect.waves-buap .waves-ripple {
      background-color: rgb(0, 181, 226);
    }
</style>

<h3 id="titPag">Proyección de materias</h3>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Acerca de la proyección</h4>
      <p>La proyección de materias se basa en las materias que estas cursando actualmente, dando por hecho que estas serán aprobadas, se revisa si se cumple con los pre requisitos de la siguiente materia para que se pueda mostrar como proyección y la puedas considerar a cursar en tu siguiente semestre
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-buap btn-flat">Aceptar</a>
    </div>
</div>
<a class="btn-floating btn waves-effect waves-light modal-trigger" href="#modal1" id="btnModal">
  <i class="material-icons">info</i>
</a>

<ul>
  @foreach ($colMat as $item => $value)

      <li>{{$value->idmaterias}} => {{$value->nombre}} </li>

  @endforeach
</ul>

@endsection