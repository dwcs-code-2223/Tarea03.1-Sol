<?php
namespace excepciones;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of NotEmpleadoPorHoraException
 *
 * @author maria
 */
class NotSuitableClassException extends \Exception {

    private string $otraClase;

    const MSG = "La clase no es la adecuada: ";

    public function __construct(string $otraClase) {
        parent::__construct(self::MSG . $otraClase);
        $this->otraClase = $otraClase;
    }
    
    public function getOtraClase(): string {
        return $this->otraClase;
    }



}
