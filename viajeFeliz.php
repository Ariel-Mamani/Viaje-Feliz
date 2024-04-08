<?php
class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaximaPasajeros;    
    private $colPasajeros;             //Coleccion de objetos Pasajero
    private $objPesponsable;          //Coleccion de objetos Responsables
    
    public function __construct($codigo,$dest,$cantMax,$colPasajeros,$responsable)
    {
        $this->codigoViaje=$codigo;
        $this->destino=$dest;
        $this->cantMaximaPasajeros=$cantMax;
        $this->colPasajeros=$colPasajeros;
        $this->objPesponsable=$responsable;

    }
    // GETTERS Y SETTERS
    public function getCodigo(){
        return $this->codigoViaje;
    }
    public function setCodigo($num){
        $this->codigoViaje=$num;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($lugar){
        $this->destino=$lugar;
    }
    public function getCantMaxima(){
        return $this->cantMaximaPasajeros;
    }
    public function setCantMaxima($num){
        $this->cantMaximaPasajeros=$num;
    }
    public function getPasajeros(){
        return $this->colPasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->colPasajeros=$pasajeros;
    }
    public function getResponsable(){
        return $this->objPesponsable;
    }
    public function setResponsable($responsable){
        $this->objPesponsable=$responsable;
    }

    public function __toString()
    {
        return "*CODIGO DEL VIAJE: ".$this->getCodigo()."\n".
               "*DESTINO: ".$this->getDestino()."\n".
               "*CAMTIDAD MAXIMA DE PASAJEROS: ".$this->getCantMaxima()."\n".
               "*PASAJEROS: "."\n".implode(',',$this->getPasajeros())."\n".
               "*RESPONSABLE: "."\n".implode(',',$this->getResponsable())."\n";
    }
    //Verifica que haya lugar para agregar un pasajero mas
    public function verificaEspacio(){
        $verifica=false;
        $maximo=$this->getCantMaxima();
        $cantPasajeros=$this->getPasajeros();
        if(count($cantPasajeros)<$maximo){
            $verifica=true;
        }
        return $verifica;
    }

    //Se debe verificar que el pasajero no este cargado mas de una vez en el viaje
    public function agregarPasajero($objPasajero){
        $j=0;
        $coleccionPasajeros=$this->getPasajeros();
        $dniPasajero=$objPasajero->getDni();
        foreach($coleccionPasajeros as $pasajero){
            if($pasajero->getDni()==$dniPasajero){
                $j++;
            }
        }
        if($j==0){
            array_push($coleccionPasajeros,$objPasajero);
            $nuevaColPasajeros=$this->setPasajeros($coleccionPasajeros);
        }else{
            $nuevaColPasajeros=-1;
        }
        return $nuevaColPasajeros;
    }

    //Verifica que no haya un responsable cargado mas de una vez
    public function agregarResponsable($objResponsable){
        $j=0;
        $coleccionResponsables=$this->getResponsable();
        $numEmpleado=$objResponsable->getNumEmpleado();
        foreach($coleccionResponsables as $responsable){
            if($responsable->getNumEmpleado()==$numEmpleado){
                $j++;
            }
        }
        if($j==0){
            array_push($coleccionResponsables,$objResponsable);
            $nuevaColResponsables=$this->setResponsable($coleccionResponsables);
        }else{
            $nuevaColResponsables=-1;
        }
        return $nuevaColResponsables;
    }
    
    //Funcion que SETEA los valores que tenia objViaje(codigo,destino,capacidad maxima)
    public function modificaInformacion($codigo,$destino,$cantMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxima($cantMaxima);
    

    }
}
