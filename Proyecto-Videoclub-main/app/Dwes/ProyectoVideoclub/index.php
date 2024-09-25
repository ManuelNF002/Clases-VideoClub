<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <style>
        form{
            width: 200px;
            height: auto;
            margin: auto;
            text-align: center;
        }
        input{
            padding: 5px;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <fieldset>
            <legend>Log In</legend>
            <p>
                <input type="text" name="usuario" required placeholder="Usuario">
            </p>
            <p>
                <input type="password" name="password" required placeholder="Contraseña">
            </p>
            <input type="submit" value="Iniciar Sesión">
        </fieldset>

    </form>
</body>
</html>