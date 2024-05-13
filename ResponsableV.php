<?php
class Responsable{
    private $numEmpleado;
    private $numLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmp,$licencia,$nombre,$apellido)
    {
        $this->numEmpleado=$numeroEmp;
        $this->numLicencia=$licencia;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }
    // GETTERS Y SETTERS
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function setNumEmpleado($num){
        $this->numEmpleado=$num;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    public function setNumLicencia($num){
        $this->numLicencia=$num;
    }
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
    public function __toString()
    {
        return "   NUMERO EMPLEADO: ".$this->getNumEmpleado()."\n".
               "   NUMERO LICENCIA: ".$this->getNumLicencia()."\n".
               "   NOMBRE: ".$this->getNombre()."\n".
               "   APELLIDO: ".$this->getApellido()."\n";
    }
    //Modifico la informacion el responsable
    public function modificarResponable($nuevoNumEmpleado,$nuevoNombre,$nuevoApellido){
        $this->setNumEmpleado($nuevoNumEmpleado);
        $this->setNombre($nuevoNombre);
        $this->setApellido($nuevoApellido);
    } 
}