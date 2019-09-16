<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
?>

<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Listado de servicios</h2>
  </div>
  <div class="panel-body">
    <?php
    $consulta="Select * from servicio;";
    $resultado=query($consulta);
    ?>
    <form value="" action="CrearServicio.php"  method="">
      <input type="submit" name=""  class="btn btn-success" value="Agregar+">
    </form>
    <table border="2"  cellspacing=100 cellpadding=2>


      <?php
      $contador=0;
      while ($cl = mysqli_fetch_array( $resultado )){
        if($contador==0){
          ?>
          <tr>
            <div class="card-group">
              <?php
            }
            ?>

            <td border="5px">
              <div class="card border-primary mb-3" style="width: 30rem;">
                <div class="card-body">
                  <h3 class="card-title"><?php echo $cl[1]; ?></h3>
                  <p class="card-text"><?php echo $cl[2]; ?></p>
                  <a href="./RegistrarServicio.php?id=<?php echo($cl[0]); ?>" class="btn btn-primary">Registrar</a>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-align-left"></span>
                    </button>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-align-left"></span>
                    </button>
                  </div>
                </td>
                <?php
                if($contador==2){
                  ?>
                </div>
              </tr>
              <?php
              $contador=0;
              continue;
            }
            $contador++;
          }
          ?>
        </table>
      </div>
    </div>

  </div>
  <?php
  include "Encabezado/abajo.php";
  ?>
