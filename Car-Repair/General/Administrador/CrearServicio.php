<?php
include "Encabezado/arriba.php";
?>
<h4 style="color:#FFFFFF;">Bienvenido!</h4>
<div class="panel panel-info">
  <div class="panel-heading">
    <h2 class="panel-title">Crear Servicio</h2>
  </div>

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
    <form class="" action="" method="post">
      <h3>Nombre</h3>
      <div class="input-group mb-3">
        <input type="text" size="100" class="form-control" name="NOMBRE" placeholder="Nombre del servicio" aria-label="Recipient's username" aria-describedby="basic-addon2">
      </div>
      <h3>Descripcion del servicio</h3>
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" rows="10" cols="100" name="DESCRIPCION" aria-label="With textarea"></textarea>
      </div>
      <br>
      <input type="submit" class="btn btn-info" name="submit" value="Agregar">
    </form>
  </div>
</div>
<?php
if(isset($_POST["submit"])){
  require "../BaseDatos/Consultas.php";
  $nombre=$_POST["NOMBRE"];
  $descripcion=$_POST["DESCRIPCION"];
  $consulta="Select * from servicio where nombre=\"".$nombre."\";";
  $res=Existe($consulta);
  if($res){
    ?>
    <script type="text/javascript">
    location.href="./CrearServicio.php?msg=Este servicio ya existe!";
    </script>
    <?php
  }else{
    $ser=new Servicio;
    $resultado=$ser->CrearServicio($nombre,$descripcion);
    ?>

    <?php
    if($resultado==true){
      ?>
        <script type="text/javascript">
          location.href="./ListaServicio.php";
        </script>
      <?php
    }else{
      ?>
      <script type="text/javascript">
      location.href="./CrearServicio.php?msg=No se pudo crear!";
      </script>
      <?php
    }
  }
}

?>
<?php
include "Encabezado/abajo.php";
?>
