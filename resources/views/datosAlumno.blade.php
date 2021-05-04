@extends('layouts.adminPlantilla')
@section('titulo', 'Buscar alumno')
@section('cuerpo')

<style>
    #bloque1{
        width: 90%;
        margin-top: 10px;
        margin-right: auto;
        margin-left: auto;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    #datosAlumno{
        overflow-y:scroll;
        height:430px;
        width:46%;
        margin-top: 10px;
        margin-left:10px;
        background-color:lightgray;
    }
    #datosAlumno table {
        width:100%;
        background-color:lightgray;
    }
    td {
        border-top: 1px solid black;
    }
    #contenido{
        height:450px;
        width:50%;
        margin-left:15px;
        margin-top: 10px;
        background-color: rgb(0, 59, 92);
    }
    #datos{
        width:100%;
        height:390px;
        padding: 10px;
        color: white;
    }
    #buscar{
        width: 30%;
        margin-left: 45%;
        color:white;
        font-weight: bold;
        font-size: 17px;
    }
    h5,h4{
        display: none;
    }
</style>

<div id="bloque1" class="z-depth-3">
    <div class="row">
        <div class="col s9" id="datosAlumno">
            <table class="highlight centered responsive-table datosAlumno">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Matricula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $item)
                    <tr>
                        <td style="text-align: left;width:50%;">{{$item->Nombre}} {{$item->ApellidoPaterno}} {{$item->Materno}}</td>
                        <td>{{$item->Matricula}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col s9" id="contenido">
            <div id="datos">
                <h4 style="text-align: center;">Datos del alumno</h3>
                <h5 class="center-align white-text condensed light">Ingeniería en tecnologías de la información <br>(Ciudad Universitaria)</h5>
                <br><h5 class="center-align white-text condensed light" id="nombre">Genaro Ramírez Santiago</h5>
                <br><h5 class="center-align white-text condensed light" id="matricula">201865950</h5>
                <br><h5 class="center-align white-text condensed light" id="promedio">Promedio<br>8.4</h5>

            </div>
            <div id="buscador">   
                @csrf    
                <input type="text" id="buscar" placeholder="Matricula">
                <a class="waves-effect waves-light btn" id="btnBuscar">Buscar</a>
            </div>
        </div> 
    </div>
</div>

<script>
    $("#btnBuscar").click(function(e){   
        e.preventDefault();
        var matri=$("#buscar").val();
        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('obt')}}",
            type:"POST",
            data:{
                matricula:matri,
                _token:_token
            },success:function(response)
            {
                if(response){
                    var arreglo=JSON.parse(response);
                    $("#nombre").html(arreglo[0].Nombre+" "+arreglo[0].ApellidoPaterno+" "+arreglo[0].ApellidoMaterno);
                    $("#matricula").html(arreglo[0].Matricula);
                    $("h5").css("display","block");
                    $("h4").css("display","block");
                }
            }            
        });
    });
</script>
@endsection
    
