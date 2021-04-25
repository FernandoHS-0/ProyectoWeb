<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambio de contraseña</title>
</head>
<body>
    <form action="cambio" method="POST">
        @csrf
        <label for="nPass">Ingrese una nueva contraseña</label>
        <input type="password" name="nPass"><br>
        <label for="confPass">Vuelva a escribir su contraseña</label>
        <input type="password" name="confPass"><br>
        <button type="submit">Cambiar</button>
    </form>
</body>
</html>