<?php
include_once("Consultas.php");


function eliminarCliente($cui)
{
    try {
        $var = sprintf("DELETE from cliente where cui = '%d'; ", $cui);
        $consulta="DELETE FROM cliente WHERE cui=$cui;";
        query($consulta);
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
            "UPDATE CLIENTE SET nombre = '%s' , nickname = %s, correo= '%s', pass = '%s' , direccion = '%s' , telefono = '%s' , nit = '%s'  where cui = '%d';",
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

        $consulta = "UPDATE cliente SET cliente.nombre=\"".$nombre."\", cliente.nickname=\"".$nickname."\", cliente.correo=\"".$correo."\", cliente.pass=\"".$pass."\", cliente.direccion=\"".$direccion."\", cliente.telefono=\"".$telefono."\", cliente.nit=\"".$nit."\" WHERE cliente.cui=$cui;";
        //$consulta = "UPDATE cliente SET (cui,nombre,nickname,correo, pass, direccion, telefono, nit) VALUES ($cui, \"$nombre\", \"$nickname\", \"$correo\", \"$pass\", \"$direccion\", \"$telefono\", \"$nit\");";
        //$consulta="UPDATE noticia SET noticia.nombre_noticia=\"".$titulo."\", noticia.texto=\"".$texto."\" WHERE noticia.id=$id;";
        // WHERE noticia.id=$id;";
         //(cui,nombre,nickname,correo, pass, direccion, telefono, nit) VALUES ($cui, \"$nombre\", \"$nickname\", \"$correo\", \"$pass\", \"$direccion\", \"$telefono\", \"$nit\");";        
        //$consulta="UPDATE noticia SET noticia.nombre_noticia=\"".$titulo."\", noticia.texto=\"".$texto."\" WHERE noticia.id=$id;";
        //echo $consulta;
        query($consulta);
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