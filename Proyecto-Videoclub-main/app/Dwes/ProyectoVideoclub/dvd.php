<?php
include_once "soporte.php";
class Dvd extends Soporte{
    public string $idiomas;
    private string $formatoPantalla;

    /**
     * @param string $idiomas
     * @param float $formatoPantalla
     */
    public function __construct(string $titulo, int $numero, float $precio, string $idiomas, string $formatoPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(): void
    {
        echo("<br>Película en DVD:");
        parent::muestraResumen();
        echo("<br>Idiomas: " . $this->idiomas . "<br>Formato Pantalla: " . $this->formatoPantalla);

    }


}