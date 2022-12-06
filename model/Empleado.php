<?php

namespace model;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Empleado
 *
 * @author maria
 */
abstract class Empleado {
 protected string $nombre;
 protected string $apellidos;
 protected string $nss;
 
 protected float $porcentaje;
 
 public function __construct(string $nombre, string $apellido, string $nss, float $porcentaje=0) {
     $this->nombre = $nombre;
     $this->apellidos = $apellido;
     $this->nss = $nss;
     $this->porcentaje = $porcentaje;
 }

 public function getNombre(): string {
     return $this->nombre;
 }

 public function getApellido(): string {
     return $this->apellidos;
 }

 public function getNss(): string {
     return $this->nss;
 }

 public function getPorcentaje(): float {
     return $this->porcentaje;
 }

 public function setNombre(string $nombre): void {
     $this->nombre = $nombre;
 }

 public function setApellido(string $apellido): void {
     $this->apellidos = $apellido;
 }

 public function setNss(string $nss): void {
     $this->nss = $nss;
 }

 public function setPorcentaje(float $porcentaje): void {
     $this->porcentaje = $porcentaje;
 }

  
 public function getNombreCompleto():string{
     return implode(" ", [$this->nombre, $this->apellidos]);
 }
 public abstract function salarioMes():float;
 public abstract function aumentoSalario():void;
 
}
