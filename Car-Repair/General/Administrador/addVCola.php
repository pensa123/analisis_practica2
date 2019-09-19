<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
include "../BaseDatos/Vehiculos.php";


?>
<style>
    p,
    .wh {
        color: #FFFFFF;
        ;
    }
</style>
<h2 class="wh">Agregar vehiculo a cola</h2>


<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Agregar vehiculo a la cola</h2>
  </div>
  <div class="panel-body">
    <form class="" action="" method="post">

      <div class="panel-body">
        <?php
        if(isset($_GET["msg"])){
          ?>
          <div class="alert alert-danger">
            <a href="#" class="alert-link"><?php echo $_GET["msg"]; ?></a>
          </div>
          <?php
        }
         ?>
        <div class="input-group mb-3">

          <h3>Placa</h3>
          <input type="text" value=""size="15" class="form-control" name="PLACA" placeholder="Placa del vehiculo" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <br>
          <h3>Cliente</h3>
          <input type="text" value="" size="30" class="form-control" name="CLIENTE" placeholder="DPI" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <br>
          <h3>Fecha</h3>
          <br>
          <input class="form-control" size="10" type="date" name="FECHA" value="">
          <br>
          <h3>Descripcion</h3>
          <textarea class="form-control" rows="10" id="y" cols="100" name="DESCRIPCION" aria-label="With textarea"></textarea>
          <br/>
          <hr/>
        </div>
        <br/>
        <input type="submit" name="submit" value="Registrar Trabajo" class="btn btn-info">
        
      </div>
    </form>
  </div>
</div>



<?php
include "Encabezado/abajo.php";
?>