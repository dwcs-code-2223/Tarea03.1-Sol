<?php

namespace model;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Asalariado
 *
 * @author maria
 */

class Asalariado extends Empleado{
    
    CONST NUM_PAGAS = 14; 
    
    private float $salarioAnual;
    
    public function __construct( string $nombre, string $apellido, string $nss, float $salarioAnual,  float $porcentaje= Empleado::DEFAULT_PORCENTAJE) {
        parent::__construct($nombre, $apellido, $nss, $porcentaje);
        $this->salarioAnual = $salarioAnual;
        
    }
    
    public function aumentoSalario(): void {
        $this->salarioAnual= $this->salarioAnual*(1+$this->porcentaje);
    }

    public function salarioMes(): float {
        return $this->salarioAnual/self::NUM_PAGAS;
    }

}
