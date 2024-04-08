<?php
class Pasajeros{
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    public function __construct($nombre,$apellido,$dni,$telefono)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->dni=$dni;
        $this->telefono=$telefono;
    }
    // GETTERS Y SETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($num){
        $this->telefono=$num;
    }
   
    public function __toString()
    {
        return "   NOMBRE: ".$this->getNombre()."\n".
               "   APELLIDO: ".$this->getApellido()."\n".
               "   DNI: ".$this->getDni()."\n".
               "   TELEFONO: ".$this->getTelefono()."\n";
    }
}