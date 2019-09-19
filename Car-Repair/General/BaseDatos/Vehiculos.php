<?php
include_once("Consultas.php");


function eliminarVehiculo($placa)
{
    try {
        $var = sprintf("DELETE from vehiculo where placa = '%s'; ", $placa);
        query($var);
        return true;
    } catch (Exception $e) { }
}

function crearVehiculo($placa, $marca, $modelo, $aniofab)
{
    try {
        $var = sprintf("INSERT INTO vehiculo values('%s' , '%s', '%s' , %d);", $placa, $marca, $modelo, $aniofab);
        query($var);
        return true;
    } catch (Exception $e) { }
}


function obtenerVehiculo($where = "1 = 1")
{

    try {
        $var = sprintf("select * from vehiculo where %s; ", $where);
        return query($var);
    } catch (Exception $e) { }
}



function editVehiculo($placa, $marca, $modelo, $aniofab)
{
    try {
        $var = sprintf(
            "UPDATE VEHICULO SET marca = '%s' , modelo = '%s' , anio_fabricacion = %d where placa = '%s';",
            $marca,
            $modelo,
            $aniofab,
            $placa
        );
        query($var);
        return true;
    } catch (Exception $e) { }
}


function addVehiculoCola($cliente, $empleado, $vehiculo, $fecha_estimada, $descripcion, $prioridad = 0)
{
    try {
        $var = sprintf("insert into entrada_vehiculo(cliente, empleadoEncargado , vehiculo , fecha_salidaEstimada,descripcionDelProblema, fecha_ingreso , estado , prioridad ) 
        values (%s , %s , '%s' , '%s' , '%s', CURDATE() ,0 , %d); "
        ,$cliente , $empleado , $vehiculo , $fecha_estimada , $descripcion , $prioridad); 
        query($var);
        return true;
    } catch (Exception $e) { }
}

function quitarDeCola($id , $suma = 1){
    try{
        $var = sprintf("update entrada_vehiculo set estado = estado + %d where id = %d;" , $suma , $id); 
        query($var); 
        return true; 
    }catch(Exception $e){}

}

function quitarLista($id, $suma = 1){
    try{
        $var = sprintf("update entrada_vehiculo set estado = estado + %d, fecha_salida = CURDATE() where id = %d;" , $suma , $id); 
        query($var); 
        return true; 
    }catch(Exception $e){}
}