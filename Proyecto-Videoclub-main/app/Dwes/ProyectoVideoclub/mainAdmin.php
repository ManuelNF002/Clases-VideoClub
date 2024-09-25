<!-- mainAdmin.php -->
<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['pass'] !== 'admin') {
    header("Location:main.php");
    exit();
}/*
include 'autoload.php';
$cliente1 = new Dwes\ProyectoVideoclub\Cliente("Manuel Navarro", "manuel", "password123", 666463423);
$cliente2 = new Dwes\ProyectoVideoclub\Cliente("Ana Pérez", "ana", "pass123", 123456789);
$clientes = [$cliente1, $cliente2];*/
$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Administrador</title>
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
<h1>Bienvenido <?php echo $usuario; ?> (Admin)</h1>
<p>
    <a href="cerrarSesion.php">Cerrar Sesión</a>
</p>
<p>
    <a href="main.php">Volver</a>
</p>

<h2>Listado de clientes:</h2>
<?php
$cliente1->listarAlquileres();
foreach ($clientes as $cliente) {
    echo "Nombre: {$cliente->nombre}, Usuario: {$cliente->getUsuario()}<br>";
}
?>
<h2>Listado de soportes:</h2>
<?php
$soporte1->muestraResumen();
$soporte2->muestraResumen();
?>
</body>
</html>
