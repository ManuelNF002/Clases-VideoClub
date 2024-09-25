<?php

namespace Dwes\ProyectoVideoclub;
use Dwes\ProyectoVideoclub\Soporte;
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;
use Dwes\ProyectoVideoclub\Juego;
use Dwes\ProyectoVideoclub\Cliente;

use Dwes\ProyectoVideoclub\Util\VideoclubException;
use Dwes\ProyectoVideoclub\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Util\ClienteNoEncontradoException;

include_once "soporte.php";
include_once "cintaVideo.php";
include_once "dvd.php";
include_once "juego.php";
include_once "cliente.php";

class Videoclub{
    private int $numProductosAlquilados = 0;
    private int $numTotalAlquileres = 0;
    private string $nombre;
    private $productos;
    private int $numProductos;
    private $socios;
    private int $numSocios;

    /**
     * @param string $nombre
     */
    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
        $this->productos = [];
        $this->numProductos = 0;
        $this->socios = [];
        $this->numSocios = 0;
    }

    public function getNumProductosAlquilados(): int {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }
    private function incluirProducto($productoN)
    {
        $this->productos[$this->numProductos] = $productoN;
        echo("<br>incluido producto:$this->numProductos<br>");
        $this->numProductos++;
    }

    public function incluirCintaVideo(string $titulo, float $precio, float $duracion)
    {
        $cintaVideoNueva = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($cintaVideoNueva);
    }

    public function incluirDvd(string $titulo, float $precio, string $idioma, string $pantalla)
    {
        $dvdNueva = new Dvd($titulo, $this->numProductos, $precio, $idioma, $pantalla);
        $this->incluirProducto($dvdNueva);
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $juegoNuevo = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juegoNuevo);
    }

    public function incluirSocio($nombre, $maxAlquilerConcurrentes = 3)
    {
        $socioNuevo = new Cliente($nombre, $this->numSocios, $maxAlquilerConcurrentes);
        $this->socios[$this->numSocios] = $socioNuevo;
        echo("<br>Incluido socio:$this->numSocios<br>");
        $this->numSocios++;
    }

    function listarProductos()
    {
        for ($i = 0; $i < $this->numProductos; $i++) {
            echo $this->productos[$i]->muestraResumen();
        }
    }

    function listarSocios()
    {
        for ($i = 0; $i < $this->numSocios; $i++) {
            echo $this->socios[$i]->muestraResumen();
        }
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos): self {
        try {
            if (isset($this->socios[$numSocio])) {
                foreach ($numerosProductos as $numProducto) {
                    if (!isset($this->productos[$numProducto]) || $this->productos[$numProducto]->alquilado) {
                        throw new SoporteNoEncontradoException("El producto $numProducto no está disponible para alquilar");
                    }
                }
                foreach ($numerosProductos as $numProducto) {
                    $this->socios[$numSocio]->alquilar($this->productos[$numProducto]);
                    $this->numProductosAlquilados++;
                    $this->numTotalAlquileres++;
                }
            } else {
                throw new ClienteNoEncontradoException("El socio no existe");
            }
            return $this;
        } catch (VideoclubException $e) {
            echo "Error: " . $e->getMessage();
            return $this;
        }
    }
    public function devolverSocioProducto(int $numSocio, int $numeroProducto): self {
        try {
            if (isset($this->socios[$numSocio]) && isset($this->productos[$numeroProducto])) {
                $this->socios[$numSocio]->devolver($numeroProducto);
                $this->productos[$numeroProducto]->alquilado = false;
            } else {
                throw new ClienteNoEncontradoException("El socio o el producto no existe");
            }
            return $this;
        } catch (VideoclubException $e) {
            echo "Error: " . $e->getMessage();
            return $this;
        }
    }

    public function devolverSocioProductos(int $numSocio, array $numerosProductos): self {
        try {
            if (isset($this->socios[$numSocio])) {
                foreach ($numerosProductos as $numProducto) {
                    if (isset($this->productos[$numProducto])) {
                        $this->socios[$numSocio]->devolver($numProducto);
                        $this->productos[$numProducto]->alquilado = false;
                    } else {
                        throw new SoporteNoEncontradoException("El producto $numProducto no existe");
                    }
                }
            } else {
                throw new ClienteNoEncontradoException("El socio no existe");
            }

            return $this;
        } catch (VideoclubException $e) {
            echo "Error: " . $e->getMessage();
            return $this;
        }
    }
}
