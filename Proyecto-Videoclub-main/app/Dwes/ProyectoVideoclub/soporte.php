<?php
namespace Dwes\ProyectoVideoclub;
/*Al hacer que la clase Soporte sea abstracta, estás indicando que no debería crearse instancias directas
 de esta clase, sino que debería servir como una clase base para otras clases que la hereden y proporcionen
implementaciones específicas del método abstracto.*/
    interface Resumible {
        public function muestraResumen();
    }
    abstract class Soporte{
        public bool $alquilado = false;
        public string $titulo;
        protected int $numero;
        private float $precio;

        const IVA =0.21;

        /**
         * @param string $titulo
         * @param int $numero
         * @param int $precio
         */
        public function __construct(string $titulo, int $numero, float $precio)
        {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }
        public function getNumero(): int
        {
            return $this->numero;
        }

        public function getPrecio(): float
        {
            return $this->precio;
        }

        public function getPrecioConIva(): float{

            return $this->precio * (1+self::IVA);
        }

        public function muestraResumen(): void{
            echo ("<br>".$this->titulo."<br>".$this->precio." (IVA no incluido)");
        }

    }





