<?php
if(isset($_GET["id"])){
  $id=$_GET["id"];
  include_once ("../BaseDatos/Consultas.php");
  $s=new Servicio;
  $s->EliminarDetalleServicio($id);
  ?>
  <script type="text/javascript">
    location.href="./ListaServicio.php";
  </script>
  <?php
}
?>
