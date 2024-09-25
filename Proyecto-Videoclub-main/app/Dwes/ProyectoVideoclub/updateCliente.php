<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userToUpdate = $_POST['user'] ?? '';

    // Buscar el cliente a actualizar
    foreach ($_SESSION['clientes'] as $key => $cliente) {
        if ($cliente->getUser() === $userToUpdate) {
            // Actualizar los campos con los nuevos valores
            $nombre = $_POST['nombre'] ?? '';
            $password = $_POST['password'] ?? '';
            $numero = $_POST['numero'] ?? '';
            $maxAlquilerConcurrente = $_POST['maxAlquilerConcurrente'] ?? '';

            $cliente->nombre = $nombre;
            $cliente->setPassword($password);
            $cliente->numero = $numero;
            $cliente->maxAlquilerConcurrente = $maxAlquilerConcurrente;

            header('Location: mainAdmin.php');
            exit();
        }
    }
}
