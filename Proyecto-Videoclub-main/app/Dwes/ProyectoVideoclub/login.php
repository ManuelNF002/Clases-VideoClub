<?php
session_start();

//Usuarios que están registrados 
$users = [
    'Manuel' => 'admin',
    'Pedro' => 'usuario',
    'Oliver' => 'usuario'
];

//Se comprueba si los usuarios están registrados para iniciar sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contra = $_POST['password'];

    if (array_key_exists($usuario, $users) && $users[$usuario] === $contra) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['pass'] = $contra;
        header("Location:main.php");
        exit();
    } else {
        echo("Credenciales incorrectas. Vuelve a intentarlo.");
    }
}