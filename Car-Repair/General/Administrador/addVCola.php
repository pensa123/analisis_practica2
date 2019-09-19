<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
include "../BaseDatos/Vehiculos.php";


$haymensaje = false;
$mensaje = "";

$haym2 = false;
$m2 = "";

if (isset($_GET["save"])) {


  $placa = $_GET["placa"];
  $cui = $_GET["cliente"];
  if (!Existe(sprintf("select * from vehiculo where placa = '%s';", $placa))) {
    $haymensaje = true;
    $mensaje = "No existe la placa " . $placa;
  }
  if (!Existe(sprintf("select * from cliente where cui = '%s';", $cui))) {
    $haymensaje = true;
    $mensaje = "No existe el cliente con cui " . $cui;
  }


  if (!$haymensaje) {
    if(addVehiculoCola($cui, $_SESSION['CUI'], $placa, $_GET["fecha"], $_GET["desc"])){
      $haym2 = true; 
      $m2 = "se ha registrado un vehiculo en cola."; 
    }
  }
}

?>
<style>
  p,
  .wh {
    color: #FFFFFF;
    ;
  }
</style>
<h2 class="wh">Agregar vehiculo a cola <?php /*date("Y-m-d"); */ ?> </h2>

<a class="btn btn-info" href="vehiculos.php">Regresar</a>
<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Agregar vehiculo a la cola</h2>
  </div>
  <div class="panel-body">
    <form class="" action="" method="GET">

      <div class="panel-body">
        <?php
        if ($haymensaje) {
          ?>
          <div class="alert alert-danger">
            <a href="#" class="alert-link"><?php echo $mensaje; ?></a>
          </div>
        <?php
        }
        
        if ($haym2) {
          ?>
          <div class="alert alert-info">
            <a href="#" class="alert-link"><?php echo $m2; ?></a>
          </div>
        <?php
        }
        ?>
        <div class="input-group mb-3">

          <h3>Placa</h3>
          <input name="placa" list="placa" size="15" class="form-control" placeholder="Placa del vehiculo">
          <br />
          <h3>Cliente</h3>
          <input size="30" list="cliente" name="cliente" class="form-control" placeholder="DPI">
          <br>
          <h3>Fecha salida estimada</h3>
          <br>
          <input class="form-control" size="10" type="date" name="fecha" value="">
          <br>
          <h3>Descripcion</h3>
          <textarea class="form-control" rows="10" id="y" cols="100" name="desc" aria-label="With textarea"></textarea>
          <br />
          <hr />
        </div>
        <br />
        <input type="submit" name="save" value="Agregar vehiculo a la cola" class="btn btn-info">

      </div>
    </form>
  </div>
</div>

<datalist id="placa">
  <?php
  $consulta = query("select * from vehiculo " . $where . ";");
  while ($res = mysqli_fetch_array($consulta)) {

    echo '<option value="' . $res["placa"] . '">';
  }
  ?>
</datalist>


<datalist id="cliente">
  <?php
  $consulta = query("select * from cliente " . $where . ";");
  while ($res = mysqli_fetch_array($consulta)) {

    echo '<option value="' . $res["cui"] . '">';
  }
  ?>
</datalist>



<?php
include "Encabezado/abajo.php";
?>