<?php
include_once("Consultas.php");


function eliminarVehiculo($placa){
    try{
        $var = sprintf("DELETE from vehiculo where placa = '%s'; " , $placa);
        echo $var;
        query($var);
        return true; 
    }catch(Exception $e){}

}

function crearVehiculo($placa, $marca, $modelo , $aniofab){
    try{
        $var = sprintf("INSERT INTO vehiculo values('%s' , '%s', '%s' , %d);", $placa , $marca , $modelo , $aniofab); 
        query($var);
        return true; 
    }catch(Exception $e){

    }

}

function editVehiculo($placa, $marca, $modelo , $aniofab){
    try{
        $var = sprintf("UPDATE VEHICULO SET marca = '%s' , modelo = '%s' , anio_fabricacion = %d where placa = '%s';",   
        $marca , $modelo , $aniofab, $placa); 
        query($var);
        return true; 
    }catch(Exception $e){}

}
