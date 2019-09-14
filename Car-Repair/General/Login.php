<?php
include "Encabezado/arriba.php"
?>
<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-danger">
    <div class="panel-heading">
      Iniciar Sesión
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post">
            <div class="form-group">
              <input class="form-control" name = "usuario" placeholder="Usuario" />
            </div>
          </br>
          <div class="form-group">
            <input class="form-control" contra = "contra" placeholder="Contraseña"/>
          </div>
          <div class="col text-center">

            <input class="btn btn-default" align="center" type="submit" name="cancel" value="Cancelar">
            <input class="btn btn-danger" type="submit" name="submit" value="Iniciar sesion">
          </div>
        </form>
      </br></br>
    </div>
  </div>
  <div class="panel-footer">
    <a class="underlineHover" href="#">¿Olvidó su contraseña?</a>
  </div>
</div>
</div>
</div>

<?php
if(isset($_POST["cancel"])){
  ?>
  <script type="text/javascript">
  location.href="./index.php";
</script>
<?php
}else if(isset($_POST["submit"])){
  ?>
  <?php
  $contra=$_POST["contra"];
  $usuario=$_POST["usuario"];
  
  ?>
  <?php
}

?>
<?php
include "Encabezado/abajo.php"
?>
