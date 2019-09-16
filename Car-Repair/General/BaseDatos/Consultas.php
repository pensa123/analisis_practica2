<?php
//si es fallo quiere decir que la sintaxis esta mala o que no se puede insertar.
function query($query){
  include "Contrasena.php";
  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

  // Selección del a base de datos a utilizar
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
  $resultado = mysqli_query( $conexion, $query ) or die ( "algo salio mal");
  mysqli_close( $conexion );
  return  $resultado;
}
function insertar($query){
  include "Contrasena.php";
  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("error");

  // Selección del a base de datos a utilizar
  $db = mysqli_select_db( $conexion, $basededatos ) or die ("error");
  $resultado = mysqli_query( $conexion, $query ) or die ("error");
  return  $resultado;
}
function Existe($query){
  $resul=query($query);
  if(mysqli_num_rows($resul)>0){
    return true;
  }
  return false;
}
function Loguear($usuario,$pass){
  $consulta="select * from cliente where nickname=\"".$usuario."\" and pass=\"".$pass."\";";
  $consulta2="select tipo from empleado where nickname=\"".$usuario."\" and pass=\"".$pass."\";";
  if(Existe($consulta)){
    return 3;
  }else if(Existe($consulta2)){
    $resultado=query($consulta2);
    $cl = mysqli_fetch_array( $resultado );
    return $cl[0];
  }else{
    return 0;
  }
}
function UElemento($query){
  $res=query($query);
  $cl=mysqli_fetch_array($res);
  return $cl[0];
}
class Servicio{
  public function CrearServicio($nombre,$descripcion){
    $consulta1="Select * from servicio where nombre=\"".$nombre."\";";
    $res=Existe($consulta1);
    if($res){return false;}
    $consulta="Insert into servicio(nombre,descripcion) values (\"".$nombre."\" ,\"".$descripcion."\");";
    $res=query($consulta);
    if($res==="algo salio mal"){
      return false;
    }
    return true;
  }

  public function ActualizarServicio($id,$nombre,$descripcion){
    $consulta="Update servicio set nombre=\"".$nombre."\" , descripcion=\"".$descripcion."\" where id=\"".$id."\";";
    $res=query($consulta);
    if($res==="algo salio mal"){
      return false;
    }
    return true;
  }
}
?>

<?php

?>
