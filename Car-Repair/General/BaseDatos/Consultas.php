<?php
//si es fallo quiere decir que la sintaxis esta mala o que no se puede insertar.
function query($query){
  include "Contrasena.php";
  // creación de la conexión a la base de datos con mysql_connect()
  $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("NO hay servidor");

  // Selección del a base de datos a utilizar
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "no hay bd" );
  $resultado = mysqli_query( $conexion, $query ) or die ( "algo salio mal");
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
/*
function lista($consulta , $tittle){

  ?>

  <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><h2 align="center"><?php echo $tittle; ?></h2></div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <?php
            //  require "Funciones.php";
            $resultado = query($consulta);
            $info_campo = $resultado->fetch_fields();
            $ncolumnas = 0;
            $contador=0;
            foreach ($info_campo as $valor) {
              /*if($contador==0){
              $contador=$contador+1;
              continue;
            }
            printf("<td><h4>%s</h4></td>",   $valor->name);
            $ncolumnas++;
          }
          $ncolumnas -= 1;
          ?>

        </tr>
      </thead>
      <tbody>

        <?php
        $nreg = 0;


        while ($cl = mysqli_fetch_array( $resultado )){
          //echo $cl;
          $nreg++;
          print('<tr>');
          $aux = false;
          $contador2=0;
          foreach($cl as $valor){

            if($contador2==0){

              $contador2=$contador2+1;
              $aux=true;
              continue;
            }
            if($aux == true){

              $aux = false;
              continue;
            }
            $aux = true;
            printf("<td>%s</td>",   $valor);
          }
          print('</tr>');
        }
        $resultado->free();

        ?>
      </tbody>
    </table>
  </div>
</div>

<?php
}
*/
?>

<?php

?>
