<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="icon" href="{{asset('storage\images\buapBlanco.ico')}}">
    <link rel="stylesheet" href=" {{asset('css\loginStyle.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>  
    <title>Iniciar sesión</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .contenedor{
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            animation: animate 16s ease-in-out infinite;

        }

        @keyframes animate{
            0%,100%{
                background-image: url('css/fondoLogin5.jpg');
            }

            25%{
                background-image: url('css/fondoLogin2.jpg');
            }

            50%{
                background-image: url('css/fondoLogin3.jpg');
            }

            75%{
                background-image: url('css/fondoLogin4.jpg');
            }
        }

    </style>
</head>
<body>
    <div class="contenedor row">
        <div class="col s12 m4 l3" id="side">
            <img src="{{asset('storage/images/side4.jpg')}}" alt="side" draggable="false" style="height: 100vh; margin:0;">
        </div>
        <div class="col s12 m8 l9" id="cardLog">
            <h3 class="condensed light" id="titSes">Iniciar sesión</h3>
            <form action="user" method="POST" class="col s10">
            @csrf
            <div class="row">
                <div class="input-field col s12">
                <input type="text" name="matricula" id="matricula" class="validate">
                <label for="matricula" data-error="{{ $errors->first('matricula') }}">Matricula</label>
            </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                <input type="password" name="contrasena" id="contrasena" class="validate">
                <label for="contrasena" data-error="{{$errors->first('contrasena')}}">Contraseña</label>
            </div>
            </div>
            <div class="col s12">
                <button type="submit" class="waves-effect waves-light btn" id="btnIn">Ingresar</button>
            </div>
        </form>
        </div>
    </div>
    
    
</body>
</html>