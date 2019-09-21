<?php
include_once("Consultas.php");


function eliminarCliente($nickname)
{
    try {
        $var = sprintf("DELETE from cliente where nickname = '%s'; ", $nickname);
        query($var);
        return true;
    } catch (Exception $e) { }
}

function crearCliente($cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit)
{
    try {
        //$consulta="INSERT INTO noticia (id,nombre_noticia,texto,creador,imagen) VALUES(NULL,\"$titulo\",\"$texto\",$user,\"$imagen\");";
	    //$resultado = mysqli_query( $conn, $consulta ) or die ( " algo salio mal");
	    //return true;
        $consulta = "INSERT INTO cliente (cui,nombre,nickname,correo, pass, direccion, telefono, nit) VALUES ($cui, \"$nombre\", \"$nickname\", \"$correo\", \"$pass\", \"$direccion\", \"$telefono\", \"$nit\");";
        //$var = sprintf("INSERT INTO cliente values('%d' , '%s', '%s' , %s , %s , %s , %s , %s);", $cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit);
        //resultado = mysqli_query($conn,$consulta) or die ("algo salio mal");

        //echo $cui;
        query($consulta);
        return true;
    } catch (Exception $e) { }
}


function obtenerCliente($where = "1 = 1")
{

    try {
        $var = sprintf("select * from cliente where %s; ", $where);
        return query($var);
    } catch (Exception $e) { }
}



function editCliente($cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit)
{
    try {
        $var = sprintf(
            //$var = sprintf("INSERT INTO cliente values('%d' , '%s', '%s' , %s , %s , %s , %s , %s);", $cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit);
            "UPDATE CLIENTE SET nombre = '%s' , nickname = %d, correo= '%s', pass = '%s' , direccion = '%s' , telefono = '%s' , nit = '%s'  where cui = '%s';",
            //"UPDATE VEHICULO SET marca = '%s' , modelo = '%s' , anio_fabricacion = %d where placa = '%s';",
            //cui = '%d' , 
            $nombre,
            $nickname,
            $correo,
            $pass,
            $direccion,
            $telefono,
            $nit,
            $cui
        );
        query($var);
        return true;
    } catch (Exception $e) { }
}

/*
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
*/