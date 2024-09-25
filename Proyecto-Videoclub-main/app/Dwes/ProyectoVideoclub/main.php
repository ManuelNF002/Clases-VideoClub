<?php
session_start();
//Si no existe una sesión lo manda de vuelta al inicio de sesión
if (!isset($_SESSION['usuario'])) {
    header("Location:index.php");
    exit();
}
//Si existe se almacena en esta variable que se utilizará para mostrar el nombre del que ha iniciado sesión
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        a{
            color: blue;
            text-decoration: none;
        }
        a:hover{
            color: red;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>Bienvenido <?php echo($usuario); ?></h1>
<p>
    <a href="mainAdmin.php">Acceder como Admin</a>
</p>
<p>
    <a href="mainCliente.php">Acceder como Usuario</a>
</p>
<p>
    <a href="cerrarSesion.php">Cerrar Sesión</a>
</p>
</body>
</html>