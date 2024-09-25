<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userToRemove = $_POST['user'] ?? '';

    // Buscar y eliminar el cliente
    foreach ($_SESSION['clientes'] as $key => $cliente) {
        if ($cliente->getUser() === $userToRemove) {
            unset($_SESSION['clientes'][$key]);
            header('Location: mainAdmin.php');
            exit();
        }
    }
}
