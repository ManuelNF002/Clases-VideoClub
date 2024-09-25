<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['pass'] === 'admin') {
    header("Location:main.php");
    exit();
}
$usuario = $_SESSION['usuario'];
include 'autoload.php';

$cliente1 = new Dwes\ProyectoVideoclub\Cliente("Manuel Navarro", "manuel", "password123", 666463423);
$cliente2 = new Dwes\ProyectoVideoclub\Cliente("Ana Pérez", "ana", "pass123", 123456789);

$clientes = [$cliente1, $cliente2];

$clienteActual = null;
foreach ($clientes as $cliente) {
    if ($cliente->getUser() === $usuario) {
        $clienteActual = $cliente;
        break;
    }
}

// Mostrar alquileres del cliente
if ($clienteActual) {
    echo "<h1>Alquileres de {$clienteActual->nombre}</h1>";
    $alquileres = $clienteActual->getAlquileres();
    foreach ($alquileres as $alquiler) {
        echo $alquiler . "<br>";
    }
} else {
    echo "Cliente no encontrado.";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona Usuario</title>
    <style>
        a {
            color: blue;
            text-decoration: none;
        }

        a:hover {
            color: red;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Bienvenido <?php echo ($usuario); ?> (Usuario)</h1>
    <p>
        <a href="cerrarSesion.php">Cerrar Sesión</a>
    </p>
    <p>
        <a href="main.php">Volver</a>
    </p>

    <h2>Tus alquileres:</h2>
    <p>Me pasa lo mismo, no me va a mostrar nada porque desde que hice el namespace no me encuentra nunca las clases.
    </p>
</body>

</html>