<?php
include "Encabezado/arriba.php"
session_start();
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
            <input class="form-control" name= "contra" placeholder="Contraseña"/>
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


<?php
if(isset($_POST["cancel"])){
  ?>
  <script type="text/javascript">
  location.href="./index.php";
//  alert("saliendo");
</script>
<?php
}else if(isset($_POST["submit"])){
  ?>


  <?php
  $contra=$_POST["contra"];
  $usuario=$_POST["usuario"];
  require "./BaseDatos/Consultas.php";
  $cuenta=Loguear($usuario,$contra);

  if($cuenta==3){
    session_start();
    $_SESSION['CUENTA']=3;
    $_SESSION['USER']=UElemento("select nombre from cliente where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
    $_SESSION['CUI']=UElemento("select cui from cliente where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
    ?>
    <script type="text/javascript">

      location.href="./Cliente/index.php";
    </script>
    <?php
  }else if($cuenta==2){
    //admin
    session_start();
    $_SESSION['CUENTA']=2;
    $_SESSION['USER']=UElemento("select nombre from empleado where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
    $_SESSION['CUI']=UElemento("select cui from empleado where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
    ?>
    <script type="text/javascript">

      location.href="./Administrador/index.php";
    </script>
    <?php
  }else if($cuenta==1){
      //mecanico
      session_start();
      $_SESSION['CUENTA']=1;
      $_SESSION['USER']=UElemento("select nombre from empleado where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
      $_SESSION['CUI']=UElemento("select cui from empleado where nickname=\"".$usuario."\" and pass=\"".$contra."\";");
      ?>
      <script type="text/javascript">

        location.href="./Mecanico/index.php";
      </script>
      <?php
  }else{
    ?>
    <div class="alert alert-info">
      <a href="" class="alert-link">Usuario o contraseña incorrectos</a>
    </div>
    <?php
  }
  ?>

  <?php
}

?>
</div>
</div>
</div>
<?php
include "Encabezado/abajo.php"
?>
