<?php

include_once "soporte.php";

class Cliente{
    public string $nombre;
    private int $numero;
    private int $maxAlquilerConcurrente;
    private int $numSoportesAlquilados;
    private $soportesAlquilados;
    public string $usuario;
    public string $password;

    //Constructor donde se controlan todas las variables del cliente
    public function __construct(string $nombre,string $usuario, string $password, int $numero, int $maxAlquilerConcurrente = 3){
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        $this->numSoportesAlquilados = 0;
        $this->soportesAlquilados = [];
    }

    //getters y setters de Cliente
    public function getUsuario(): string{
        return $this->usuario;
    }
    public function getPassword(): string {
        return $this->password;
    }

    //En este get recoge cada uno de los alquieleres realizados, recorriendo el array, poniendo la descripción de cada uno de ellos y metiendolos en otro array
    //que será el que se devolverá.
    public function getAlquileres(): array {
        $alquileres = [];
        foreach ($this->soportesAlquilados as $soporte) {
            $alquileres[] = $soporte->muestraResumen();
        }
        return $alquileres;
    }
    public function getNumero(){
        return $this->numero;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumSoportesAlquilados(){
        return $this->numSoportesAlquilados;
    }

    //Esta es la función mediante la cual se podrán añadir soportes alquilados nuevos al array, además de contar el número de soportes que se van añadiendo,
    //para luego tener el total de soportes alquilados, y todo esto comprobando el maximo de soportes que se pueden alquilar.
    public function aniadirSoportesAlquilados(Soporte $soporte){
        if (count($this->soportesAlquilados) < $this->maxAlquilerConcurrente) {
            $this->soportesAlquilados[] = $soporte;
            $this->numSoportesAlquilados++;
        } else {
            echo "No se puede alquilar más soportes porque se ha alcanzado el maximo de soportes alquilados.";
        }
    }

    //Función para ver si un soporte específico ya está alquilado por ese cliente.
    public function tieneAlquilado(Soporte $s): bool{
        $alquilado = in_array($s, $this->soportesAlquilados);
        return $alquilado;
    }

    //Función mediante la cual un cliente podrá alquilar un soporte
    public function alquilar(Soporte $s): self {
        $encontrado = $this->tieneAlquilado($s);
        if ($encontrado) {
            throw new SoporteYaAlquiladoException("No se ha podido añadir porque ya ha sido alquilado");
        } elseif (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("No se puede alquilar porque ya se ha alcanzado el máximo de alquileres posibles");
        } else {
            $this->soportesAlquilados[] = $s;
            $this->numSoportesAlquilados++;
            $s->alquilado = true;
            return $this;
        }
    }

    //Función para que un cliente pueda devolver un soporte
    public function devolver(int $numSoporte): self {
        if ($numSoporte > count($this->soportesAlquilados)) {
            throw new SoporteNoEncontradoException("El soporte $numSoporte no se ha podido devolver porque este cliente no lo tiene alquilado");
        } else {
            $soporteDevuelto = $this->soportesAlquilados[$numSoporte];
            unset($this->soportesAlquilados[$numSoporte]);
            $soporteDevuelto->alquilado = false; // Marcamos el Soporte como no alquilado
            return $this;
        }
    }

    //Función para listar todos los soportes alquilados del cliente
    public function listarAlquileres(): void{
        foreach ($this->soportesAlquilados as $soporte) {
            echo($soporte->muestraResumen() . "<br>");
        }
    }

    //Función para mostrar datos del cliente, como el nombre y la cantidad de soportes que tiene alquilados.
    public function muestraResumen(){
        echo "<br>Nombre: " . $this->nombre . "<br>";
        echo "Cantidad de soportes alquilados: " . count($this->soportesAlquilados) . "<br>";
    }


}


//Estos son pruebas para ver que funcionaba a la misma vez que lo iba desarrollando, creando instancias y mostrándolas.
/*
$cliente1= new Cliente("Manuel Navarro",666463423);
$soporte1 = new Soporte("Tenet", 22, 3);
$soporte2 = new Soporte("Cazafantasmas", 25, 8);
$soporte3 = new Soporte("Caperucita", 52, 5);
$soporte4 = new Soporte("Frosslaass", 17, 12);

$cliente1->alquilar($soporte1);
//$cliente1->alquilar($soporte2);
$cliente1->alquilar($soporte2);
$cliente1->alquilar($soporte3);
//$cliente1->alquilar($soporte4);
$cliente1->listarAlquileres();

$cliente1->muestraResumen();

$cliente1->devolver(2);
$cliente1->listarAlquileres();
*/





