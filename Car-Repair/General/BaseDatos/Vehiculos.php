<?php
include_once("Consultas.php");


function crearVehiculo($placa, $marca, $modelo , $aniofab){
    try{
        $var = sprintf("INSERT INTO vehiculo values('%s' , '%s', '%s' , %d);", $placa , $marca , $modelo , $aniofab); 
        query($var);
        return true; 
    }catch(Exception $e){

    }

}
