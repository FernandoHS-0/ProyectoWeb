<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="icon" href="{{asset('storage\images\buapBlanco.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>  
    
    <script>
        $(document).ready(function(){
            $('.dropdown-button').dropdown();
            $('.modal-trigger').leanModal();
        });
    </script>
    
    <title>@yield('titulo')</title>
    
    <style>
        #buap1{
          background-color: rgb(0, 59, 92);
        }
        #footer1{
          background-color: rgb(0, 59, 92);
        }
        #logo{
            margin-left: 10%;
        }
        #nav-mobile{
            margin-right: 10%;
        }
        .centrar{
          display: block;
          margin-left: auto;
          margin-right: auto;
        }
        #dropdown1 li a{
          color: rgb(0, 59, 92);
        }
    </style>

</head>
<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{route('matCurs')}}">Cursadas</a></li>
        <li><a href="{{route('enCurso')}}">En curso</a></li>
        <li><a href="{{route('proyAl')}}">Proyección</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper" id="buap1">
          <a href="{{route('inicioAlumno')}}" class="brand-logo" id="logo">BUAP</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="{{route('inicioAlumno')}}">Perfil</a></li>
            <li><a href="{{route('mapaAl')}}">Mapa</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Materias<i class="material-icons right">arrow_drop_down</i></a></li>
          </ul>
        </div>
      </nav>

      @yield('cuerpo')

      <footer class="page-footer" id="footer1">
        <div class="container">
          <div class="row">
            <div class="col l6 s12">
              <h5 class="white-text">Diseño de la intarección</h5>
              <p class="grey-text text-lighten-4">Primavera 2021.</p>
            </div>
            <div class="col l4 offset-l2 s12">
              <h5 class="white-text">Equipo 7</h5>
              <ul>
                <li><a class="grey-text text-lighten-3" href="#!">Hernández Sánchez Luis Fernando</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Navarro Lazcano Monserrat</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Pérez Pérez Stephane</a></li>
                <li><a class="grey-text text-lighten-3" href="#!">Ramírez Santiago Genaro</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            © 2021 BUAP
          </div>
        </div>
      </footer>

</body>
</html>