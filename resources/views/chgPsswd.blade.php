<!DOCTYPE html>
<html lang="en">
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
    <title>Cambio de contraseña</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        #footer1{
            background-color: rgb(0, 59, 92);
            position: absolute;
            clear: round($number: 0);
            left:0px;
            bottom:0px;
            width:100%;
        }
        .buap1{
            background-color: rgb(0, 59, 92);
        }

        #contForm{
            width: 35%;
            margin-left: 30%;
            background-color: white;
            padding-top: 2%;
            padding-left: 5%;
            padding-right: 5%;
            padding-bottom: 2%;  
        }

        #offsetIn{
            margin-left: 40%;
        }

        #logo{
            margin-left: 10%;
        }
        #eslogan{
            margin-right: 10%;
        }
        .waves-effect.waves-buap .waves-ripple {
            background-color: rgb(0, 181, 226);
        }
        #btnModal{
            display: inline-block;
            margin-left: 1%;
            margin-bottom: 1%;
            background-color: rgb(0, 181, 226);
        }
    </style>
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });
    </script>
</head>
<body>
    <nav>
        <div class="nav-wrapper buap1">
           |<a href="#" class="brand-logo" id="logo">BUAP</a>
            <p class="right" id="eslogan">"Pensar bien para vivir mejor"</p>
        </div>
    </nav>
    <h3 class="condensed light" style="margin-left: 5%; margin-bottom: 5%; display:inline-block;">Cambio de contraseña</h3>
    <div id="modal1" class="modal">
        <div class="modal-content">
          <h4>Acerca del cambio de contraseña</h4>
          <p>Al ser tu primer ingreso debes cambiar la contraseña por defecto que tenias, la cual era tu matricula, por una nueva con el fin de garantizar tu seguridad.</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-close waves-effect waves-buap btn-flat">Aceptar</a>
        </div>
    </div>
    <a class="btn-floating btn waves-effect waves-light modal-trigger" href="#modal1" id="btnModal">
      <i class="material-icons">info</i>
    </a>
    <div class="container row" id="contForm">
        <form action="cambio" method="POST" class="col s12">
            @csrf
            <div class="row">
                <div class="input-field offsetIn">
                    <input type="password" name="nPass">
                    <label for="nPass">Ingrese una nueva contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field offsetIn">
                    <input type="password" name="confPass">
                    <label for="confPass">Vuelva a escribir su contraseña</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="waves-effect waves-light btn buap1" id="offsetIn">Cambiar</button>
            </div>
        </form>
    </div>
    
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