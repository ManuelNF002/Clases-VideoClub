<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;
use Dwes\ProyectoVideoclub\Cliente;


//instanciamos un par de objetos cliente
$cliente1 = new Cliente("Bruce Wayne", 23);
$cliente2 = new Cliente("Clark Kent", 33);

//mostramos el número de cada cliente creado
echo "<br>El identificador del cliente 1 es: " . $cliente1->getNumero();
echo "<br>El identificador del cliente 2 es: " . $cliente2->getNumero();

//instancio algunos soportes
$soporte1 = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
$soporte2 = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
$soporte3 = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
$soporte4 = new Dvd("El Imperio Contraataca", 4, 3, "es,en","16:9");

//alquilo algunos soportes
echo("<br><br>Soportes alquilados:");
$cliente1->alquilar($soporte1)
->alquilar($soporte2)
->alquilar($soporte3);

//muestro los soportes que ya tiene alquilados
$cliente1->listarAlquileres();

echo("<br><br>Intento alquilar un soporte que ya tiene alquilado(el soporte 1):");
//voy a intentar alquilar de nuevo un soporte que ya tiene alquilado
$cliente1->alquilar($soporte1);

//el cliente tiene 3 soportes en alquiler como máximo
echo("<br>Intento alquilar un soporte más, intentando sobrepasar el maximo de alquileres posibles:");
//este soporte no lo va a poder alquilar
$cliente1->alquilar($soporte4);

echo("<br>Voy a intentar devolver un soporte que no está alquilado:");
//este soporte no lo tiene alquilado
$cliente1->devolver(4);

echo("<br><br>Devuelvo un soporte que si tiene alquilado:");
//devuelvo un soporte que sí que tiene alquilado
$cliente1->devolver(2);

echo("<br>Alquilo otro soporte:");
//alquilo otro soporte
$cliente1->alquilar($soporte4);

echo("<br><br>Lista de soportes alquilados:");
//listo los elementos alquilados
$cliente1->listarAlquileres();

echo("<br>Intento devolver un soporte de un cliente que no tiene soportes alquilados:");
//este cliente no tiene alquileres
$cliente2->devolver(2);