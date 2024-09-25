<?php
include_once "soporte.php";

//Clase para crear un juego, cuyo padre es soporte
class Juego extends Soporte{

    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    /**
     * @param string $consola
     * @param int $minNumJugadores
     * @param int $maxNumJugadores
     */
    
     //Constructor para introducir los datos del juego que se quiera añadir
    public function __construct(string $titulo, int $numero, float $precio, string $consola, int $minNumJugadores, int $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    //Función que muestra un mensaje distinto en función de los jugadores con los que se pueda jugar al juego.
    public function muestraJugadoresPosibles(): void
    {
        if ($this->maxNumJugadores == 1) {
            echo("<br>Para un jugador");
        } else if ($this->maxNumJugadores > 1 && $this->minNumJugadores == 0) {
            echo("<br>Para " . $this->maxNumJugadores . " jugadores");
        } else if ($this->minNumJugadores > 0 && $this->maxNumJugadores > 1) {
            echo("<br>De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores");
        }
    }

    //Función que muestra los datos del juego
    public function muestraResumen(): void
    {
        echo("<br>Juego para: " . $this->consola);
        parent::muestraResumen();
        $this->muestraJugadoresPosibles();
    }


}