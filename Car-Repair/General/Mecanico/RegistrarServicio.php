<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
}
?>

<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Registrar Servicio</h2>
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
          <input type="text" value="<?php if(isset($_GET["PLACA"]))echo $_GET["PLACA"]; ?>"size="15" class="form-control" name="PLACA" placeholder="Placa del vehiculo" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <br>
          <h3>Cliente</h3>
          <input type="text" value="<?php if(isset($_GET["CLIENTE"]))echo $_GET["CLIENTE"]; ?>" size="30" class="form-control" name="CLIENTE" placeholder="DPI" aria-label="Recipient's username" aria-describedby="basic-addon2">
          <br>
          <h3>Fecha</h3>
          <br>
          <input class="form-control" size="10" type="date" name="FECHA" value="">
          <br>
          <h3>Descripcion</h3>
          <textarea class="form-control" rows="10" id="y" cols="100" name="DESCRIPCION" aria-label="With textarea"><?php if(isset($_GET["DESCRIPCION"]))echo $_GET["DESCRIPCION"]; ?></textarea>
          <br>
          <br></br>
          <input type="submit" name="submit" value="Registrar Trabajo" class="btn btn-info">
        </div>
      </div>
    </form>
  </div>
</div>
<?php
if(isset($_POST["submit"])){
  $placa=$_POST["PLACA"];
  $empleado=$_SESSION["CUI"];
  $cliente=$_POST["CLIENTE"];
  $descripcion=$_POST["DESCRIPCION"];
  $fecha=$_POST["FECHA"];
  if(!Existe("select * from vehiculo where placa=\"".$placa."\";")){
    ?>
    <script type="text/javascript">
      location.href="./RegistrarServicio.php?id=<?php echo $id; ?>&msg=Error no existe esa placa&PLACA=<?php echo $placa; ?>&EMPLEADO=<?php echo $empleado; ?>&CLIENTE=<?php echo $cliente; ?>&DESCRIPCION=<?php echo $descripcion; ?>";
    </script>
    <?php
  }
  else if(!Existe("select * from empleado where cui=\"".$empleado."\"")){
    ?>
    <script type="text/javascript">
      location.href="./RegistrarServicio.php?id=<?php echo $id; ?>&msg=Error no existe ese empleado &PLACA=<?php echo $placa; ?>&EMPLEADO=<?php echo $empleado; ?>&CLIENTE=<?php echo $cliente; ?>&DESCRIPCION=<?php echo $descripcion; ?>";
    </script>
    <?php
  }
  else if(!Existe("select * from cliente where cui=\"".$cliente."\"")){
    ?>
    <script type="text/javascript">
      location.href="./RegistrarServicio.php?id=<?php echo $id; ?>&msg=Error no existe ese cliente &PLACA=<?php echo $placa; ?>&EMPLEADO=<?php echo $empleado; ?>&CLIENTE=<?php echo $cliente; ?>&DESCRIPCION=<?php echo $descripcion; ?>";
    </script>
    <?php
  }
  if(!Existe("select * from entrada_vehiculo where vehiculo=\"".$placa."\" and empleadoencargado=\"".$empleado."\" and estado<>3;")){
    ?>
    <script type="text/javascript">
    location.href="./RegistrarServicio.php?id=<?php echo $id; ?>&msg=Ese carro no esta bajo tu cuidado &PLACA=<?php echo $placa; ?>&EMPLEADO=<?php echo $empleado; ?>&CLIENTE=<?php echo $cliente; ?>&DESCRIPCION=<?php echo $descripcion; ?>";
    </script>
    <?php
  }
  else{
    //si cumple
      $ser=new Servicio;
      $ser->CrearDetalleServicio($id,$placa,$empleado,$cliente,$descripcion,$fecha);
      ?>
      <script type="text/javascript">
        location.href="ListaServicio.php";
      </script>
      <?php
  }


}
 ?>

<?php
include "Encabezado/abajo.php";
?>
