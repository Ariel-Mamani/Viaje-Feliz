<?php
include 'viajeFeliz.php';
include 'Pasajero.php';
include 'ResponsableV.php';
// COLECCION DE PASAJEROS
$objPasajero1= new Pasajeros("esteban","quito","34334434",29912345);
$objPasajero2= new Pasajeros("clara","mente","44444444",29945445);
$objPasajero3= new Pasajeros("ines","esario","55555555",29912345);
$objPasajero4= new Pasajeros("elsa","pato","66666666",29912345);
$colPasajero=[$objPasajero1,$objPasajero2,$objPasajero3,$objPasajero4];
// COLECCION DE RESPONSABLES DEL VIAJE
$objResponsable1= new Responsable("17",215477,"luis","luis");
$objResponsable2= new Responsable("18",234355,"jorge","muñoz");
$colResponsables=[$objResponsable1,$objResponsable2];

$objViaje= new Viaje(0021,"noruega",5,$colPasajero,$colResponsables);
do{
    echo "Menú de opciones\n".
         "******************************************************* \n".
         "* 1) Cargar la información del viaje                   *\n".
         "* 2) Agregar un pasajero al viaje *\n".
         "* 3) Agregar responsable del viaje                     *\n".
         "* 4) Ver datos del viaje                               *\n".
         "********************************************************\n".
         "Ingrese la opcion deseada: ";    
    $opcion = trim(fgets(STDIN));
    switch($opcion){
        case 1:
            echo "Ingrese el codigo del viaje: ";
            $codigo=trim(fgets(STDIN));
            echo "Ingrese el destino: ";
            $destino=trim(fgets(STDIN));
            echo "Ingrese una cantidad maxima de pasajeros: ";
            $limitePasajeros=trim(fgets(STDIN));
            $objViaje= new Viaje($codigo,$destino,$limitePasajeros,$colPasajero,$colResponsables);
            echo $objViaje;
            break;
        case 2:
            if($objViaje->verificaEspacio()!=false){
                echo "Ingrese nombre del pasajero: ";
                $nombre=trim(fgets(STDIN));
                echo "Ingrese el apellido: ";
                $apellido=trim(fgets(STDIN));
                echo "Ingrese el DNI: ";
                $dni=trim(fgets(STDIN));
                echo "Ingrese el numero de telefono: ";
                $telefono=trim(fgets(STDIN));
                $objPasajeroNuevo= new Pasajeros($nombre,$apellido,$dni,$telefono);
                if($objViaje->agregarPasajero($objPasajeroNuevo)==-1){
                    echo "La informacion del pasajero ya se encuentra cargada"."\n"; 
                }else{
                    echo $objViaje;
                }
            }else{
                echo "        NO HAY ESPACIO \n ";
            }
            break;
        case 3:
            echo "Ingrese numero del empleado: ";
            $num_empleado=trim(fgets(STDIN));
            echo "Ingrese numero de licencia: ";
            $num_licencia=trim(fgets(STDIN));
            echo "Ingrese el nombre: ";
            $nombre=trim(fgets(STDIN));
            echo "Ingrese el apellido: ";
            $apellido=trim(fgets(STDIN));
            $objResponsableNuevo= new Responsable($num_empleado,$num_licencia,$nombre,$apellido);
            if($objViaje->agregarResponsable($objResponsableNuevo)==-1){
                echo "ya hay un responsable con esos datos \n";
            }else{
                echo $objViaje;
            }
            break;
        case 4:
            echo $objViaje;
            default:
    }
    
}while($opcion>0);
