@extends('layouts.adminPlantilla')
@section('titulo', 'Proyecciones')
@section('cuerpo')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        td{
            border-top: 1px solid black;
            cursor: pointer;
        }
        #buscar{
            width: 30%;
            margin-left: 45%;
            color:black;
            font-weight: bold;
            font-size: 14px;
            background-color:white;
        }
        #contenido{
        height:450px;
        width:50%;
        margin-left:15px;
        background-color: rgb(0, 59, 92);
        overflow-y:scroll;
        }
    </style>

<div id="bloque1" class="z-depth-3">
    <div class="row">
        <div id="buscador" class="col s7">   
            @csrf    
            <input type="text" id="buscar" placeholder="Ingrese nombre/matricula" onkeyup="Buscar()">
            <i class="Small material-icons">search</i>

        </div>
        <div class="col s9" id="datosAlumno">   

            <table class="highlight centered responsive-table datosAlumno" id="datos">
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
            
        </div> 
    </div>
</div>

<!--Función script para el buscador-->
<script>

    function Buscar()
    {
        const registros = document.getElementById('datos'); //Almacenamos los registros/tabla
        const buscarR = document.getElementById('buscar').value.toUpperCase();//Obtenemos la cadena a buscar
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

    $("tr").click(function (e) { 
        /*Obtenemos la matricula del alumno*/
        e.preventDefault();

        var matri = $(this).find("td:last-child").text();
        var nom = $(this).find("td:first-child").text();

        var _token=$("input[name=_token]").val();

        $.ajax({
            url:"{{route('obtP')}}",
            type:"POST",
            data:{
                matricula:matri,
                _token:_token
            },success:function(response)
            {
                $("#contenido").empty();
                var arreglo=JSON.parse(response);
                $('#contenido').append('<h5 align=center style="color:white;">Proyección académica <br>'+nom+'</h5>');
                for (var i = 0; i < arreglo.length; i++) {
                    $('#contenido').append('<div style="background-color:white;width:80%;height:120px;margin-top:5px;margin-left:auto;margin-right:auto;">'
                    +'<p class="card-title center-align style="font-size:20px;">'+arreglo[i].nombre+'</p>'
                    +'<p class="card-title center-align"><strong>Nivel:</strong>'+arreglo[i].nivel+' <strong>Creditos:</strong>'+arreglo[i].creditos+'</p>'
                    +'<p class="card-title center-align">'+arreglo[i].area+'</p>'
                    +'</div><br>');

                }
            }            
        });
    });
</script>



@endsection