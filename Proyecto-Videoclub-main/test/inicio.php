<?php
require_once __DIR__ . '/../vendor/autoload.php';
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;

//include "soporte.php";
//Esto me da error porque al crear la clase soporte como abstracta no se pueden hacer instancias de esta.
//$soporte1 = new Soporte("Tenet", 22, 3);
//echo "<strong>" . $soporte1->titulo . "</strong>";
//echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
//echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
//$soporte1->muestraResumen();
echo ("<br>------------------------------------------------------------------------------------------------------------<br>");
//include "cintaVideo.php";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
echo "<strong>" . $miCinta->titulo . "</strong>";
echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();
echo ("<br>------------------------------------------------------------------------------------------------------------<br>");
//include "dvd.php";

$miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $miDvd->titulo . "</strong>";
echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
$miDvd->muestraResumen();
echo ("<br>------------------------------------------------------------------------------------------------------------<br>");
//include "juego.php";

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();
echo ("<br>------------------------------------------------------------------------------------------------------------<br>");








