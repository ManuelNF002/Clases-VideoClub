<?php

namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Soporte;
//include_once "soporte.php";

//Clase cintaVideo que tiene como padre a Soporte
class CintaVideo extends Soporte{

    private float $duracion;

    //El constructor, del cual coge algunas variables del padre Soporte, y se añade la duración de la cinta
    public function __construct(string $titulo, int $numero, float $precio, float $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    //Para mostrar los datos de la cinta de video
    public function muestraResumen(): void
    {
        echo("<br>Película en VHS:");
        parent::muestraResumen();
        echo("<br>Duración: " . $this->duracion . " minutos");
    }

}