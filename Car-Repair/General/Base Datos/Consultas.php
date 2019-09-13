<?php 
//si es fallo quiere decir que la sintaxis esta mala o que no se puede insertar.
function query($query){
include "./Contrasena.php";
$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("error de conexion");
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "error de base de datos" );
  $resultado = mysqli_query( $conexion, $query ) or die ( "fallo");
  mysql_close($conexion);
  return resultado;
}

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
              }*/
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
?>
<?php

 ?>