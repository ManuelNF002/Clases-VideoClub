<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $user = $_POST['user'] ?? '';
    $password = $_POST['password'] ?? '';
    $numero = $_POST['numero'] ?? '';
    $maxAlquilerConcurrente = $_POST['maxAlquilerConcurrente'] ?? '';

    // Crear nuevo cliente y agregarlo a la sesión
    $clienteNuevo = new Dwes\ProyectoVideoclub\Cliente($nombre, $user, $password, $numero, $maxAlquilerConcurrente);
    $_SESSION['clientes'][] = $clienteNuevo;

    header('Location: mainAdmin.php');
    exit();
}
