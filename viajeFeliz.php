<?php
class Viaje{
    private $codigoViaje;
    private $destino;
    private $cantMaximaPasajeros;    
    private $colPasajeros;             //Coleccion de objetos Pasajero
    private $objPesponsable;          //Objeto Responsable
    
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
               "*PASAJEROS: "."\n".$this->mostrarPasajeros()."\n".
               "*RESPONSABLE: "."\n".$this->getResponsable()."\n";
    }
    //MUESTRA paajeros
    public function mostrarPasajeros(){
        $pasajeros=$this->getPasajeros();
        $i=1;
        foreach($pasajeros as $pasajero){
            echo $i.": ".$pasajero."\n";
            $i++;
        }
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

    // VERIFICA que el pasajero no este cargado mas de una vez en el viaje
    public function pasajeroCargado($documento){
        $dni=$documento;
        $coleccionPasajeros=$this->getPasajeros();
        $bandera=false;
        $i=0;
        while($i<count($coleccionPasajeros) && $bandera){
            if($coleccionPasajeros[$i]->getDni()==$dni){
                $bandera=true;
            }
            $i++;
        }
        return $bandera;
    }
    //Agrega un pasajero
    public function agregarPasajero($objPasajero){
        $coleccionPasajeros=$this->getPasajeros();
        array_push($coleccionPasajeros,$objPasajero);
        $nuevaColPasajeros=$this->setPasajeros($coleccionPasajeros);
        return $nuevaColPasajeros;
    }
    
    // Agrega responsable
    public function agregarResponsable($objResponsable){
        $responsable=$this->getResponsable();
        array_push($coleccionPasajeros,$objResponsable);
        $nuevaColPasajeros=$this->setPasajeros($coleccionPasajeros);
        return $nuevaColPasajeros;
    }
    // Muestra coleccion de pasajeros
    public function muestraPasajeros(){
        $colPasajeros=$this->getPasajeros();
        $cadena=" ";
        $numPasajero=0;
        for($i=0;$i<count($colPasajeros);$i++){
            $numPasajero++;
            $pasajero=$colPasajeros[$i];
            $cadena= $cadena."Pasajero: ".$numPasajero.":\n".$pasajero."\n";
        }
        return $cadena;
    }
    
    //Funcion que SETEA los valores que tenia objViaje(codigo,destino,capacidad maxima)
    public function modificaInformacion($codigo,$destino,$cantMaxima){
        $this->setCodigo($codigo);
        $this->setDestino($destino);
        $this->setCantMaxima($cantMaxima);
    }
}
