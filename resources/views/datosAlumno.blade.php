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
    }
    #datosAlumno table {
        width:100%;
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
    h5,h4{
        display: none;
    }
    #buscarr{
            width: 30%;
            margin-left: 45%;
            color:black;
            font-weight: bold;
            font-size: 14px;
            background-color:white;
        }
</style>

<div id="bloque1" class="z-depth-3">
    <div class="row">
        <div id="buscadorr" class="col s7">   
            @csrf    
            <input type="text" id="buscarr" placeholder="Ingrese nombre/matricula" onkeyup="Buscar()">
            <i class="Small material-icons">search</i>

        </div>
        <div class="col s9" id="datosAlumno">
            <table class="highlight centered responsive-table datosAlumno" id="datoss">
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
                <br><h5 class="center-align white-text condensed light" id="progreso">Progreso academico<br>%</h5>

            </div>
        </div> 
    </div>
</div>

<script>

function Buscar()
    {
        const registros = document.getElementById('datoss'); //Almacenamos los registros/tabla
        const buscarR = document.getElementById('buscarr').value.toUpperCase();//Obtenemos la cadena a buscar
        let total = 0;

        // Recorremos todas las filas
        for (let i = 1; i < registros.rows.length; i++) {
            let encontrar = false;
            //Almacenamos las celdas de cada columna
            const celdasC = registros.rows[i].getElementsByTagName('td');
            // Recorremos todas las celdas
            for (let j = 0; j < celdasC.length && !encontrar; j++) {
                const compareWith = celdasC[j].innerHTML.toUpperCase();
                // Buscamos el texto en el contenido de la celda
                if (buscarR.length == 0 || compareWith.indexOf(buscarR) > -1) {
                    encontrar = true;
                    total++;
                }
            }
            if (encontrar) {
                /*Mostramos las coincidencias*/
                registros.rows[i].style.display = '';
            } else {
                /*Ocultamos los registros*/
                registros.rows[i].style.display = 'none';
            }
        }
    }

    $("tr").click(function(e){   
        e.preventDefault();
        var matri=$(this).find("td:last-child").text();;
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
                    $("#progreso").html("Progreso academico"+"<br>"+"%"+arreglo[1].prog);
                    $("h5").css("display","block");
                    $("h4").css("display","block");
                }
            }            
        });
    });
</script>
@endsection
    
