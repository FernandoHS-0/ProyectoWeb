<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="user" method="POST">
        @csrf
        <input type="text" name="matricula" id=""> <br><br>
        <input type="password" name="contrasena" id="">
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>