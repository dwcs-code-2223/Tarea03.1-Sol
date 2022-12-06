<?php
namespace model;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use excepciones\NotSuitableClassException;
use interfaces\IComparar;
/**
 * Description of EmpleadoPorHora
 *
 * @author maria
 */
class EmpleadoPorHora extends Empleado implements IComparar {

    //put your code here

    CONST HORA_POR_DEFECTO = 25;

    private float $precioHora;
    private float $numHorasTrabajadas;
    
    public function __construct( string $nombre, string $apellido, string $nss, float $numHorasTrabajadas, float $precioHora=self::HORA_POR_DEFECTO, float $porcentaje=0) {
        parent::__construct($nombre, $apellido, $nss, $porcentaje);
        $this->precioHora = $precioHora;
        $this->numHorasTrabajadas = $numHorasTrabajadas;
    }

        public function aumentoSalario(): void {
        $this->precioHora = $this->precioHora * (1 + $this->porcentaje);
    }

    public function salarioMes(): float {
        return $this->precioHora * $this->numHorasTrabajadas;
    }

    public function getPrecioHora(): float {
        return $this->precioHora;
    }

    public function getNumHorasTrabajadas(): float {
        return $this->numHorasTrabajadas;
    }

    public function setPrecioHora(float $precioHora): void {
        $this->precioHora = $precioHora;
    }

    public function setNumHorasTrabajadas(float $numHorasTrabajadas): void {
        $this->numHorasTrabajadas = $numHorasTrabajadas;
    }

    public function comparar($object): int {
       
        if (get_class($object) == __CLASS__) {
            return $this->numHorasTrabajadas - $object->getNumHorasTrabajadas();
        }
        else{
            throw new NotSuitableClassException(get_class($object));
        }
    }

}
