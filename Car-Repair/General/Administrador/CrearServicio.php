<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
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
        <input type="text" size="100" class="form-control" id="x" name="NOMBRE" placeholder="Nombre del servicio" aria-label="Recipient's username" aria-describedby="basic-addon2">
      </div>
      <h3>Descripcion del servicio</h3>
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <textarea class="form-control" rows="10" id="y" cols="100" name="DESCRIPCION" aria-label="With textarea"></textarea>
      </div>
      <br>
      <h3>Precio  </h3>
      <div class="input-group">
        <div class="input-group-prepend">
        </div>
        <input type="number" id="w" name="PRECIO" value="0.00">
      </div>
      <br>
      <input type="submit" id="b" class="btn btn-info" name="submit" value="Agregar">
    </form>
  </div>
</div>
<?php
if(isset($_GET['id'])){

  $id=$_GET["id"];
  $consulta="Select nombre,descripcion,precio from servicio where id=\"".$id."\";";
  $res=query($consulta);
  $cl=mysqli_fetch_array($res);
  ?>
  <script type="text/javascript">
  //alert(<?php echo $consulta; ?>);
  document.getElementById("x").value = "<?php echo $cl[0]; ?>";
  document.getElementById("y").value="<?php echo $cl[1]; ?>";
  document.getElementById("w").value="<?php echo $cl[2]; ?>"
  document.getElementById("b").value="Actualizar";
  </script>
  <?php
}

?>
<?php
if(isset($_POST["submit"])){

  $nombre=$_POST["NOMBRE"];
  $descripcion=$_POST["DESCRIPCION"];
  $precio=$_POST["PRECIO"];
  if(isset($id)){
    //para actualizar
    $consulta="Select * from servicio where nombre=\"".$nombre."\" AND id <> \"".$id."\";";
  }else{
    $consulta="Select * from servicio where nombre=\"".$nombre."\";";
  }
  $res=Existe($consulta);
  if($res){
    ?>
    <script type="text/javascript">
    location.href="./CrearServicio.php?msg=Este servicio ya existe!";
    </script>
    <?php
  }else{
    $ser=new Servicio;
    if(isset($id)){
      $resultado=$ser->ActualizarServicio($id,$nombre,$descripcion,$precio);
    }else{
      $resultado=$ser->CrearServicio($nombre,$descripcion,$precio);
    }
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
