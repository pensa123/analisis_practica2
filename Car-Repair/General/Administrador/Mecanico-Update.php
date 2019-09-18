<?php
  include "Encabezado/arriba.php";
  include "../BaseDatos/Consultas.php";
  include "Mecanico.php";
  $alerta_tipo = "\"hidden\"";
  $alerta = "";
  $cui = "";
  $nombre = "";
  $correo = "";
  $nit = "";
  $direccion = "";
  $telefono = "";
  $fechaContratacion = "";
  $estado = "";
  $nickname = "";
  $pass = "";
  $cui_anterior = "";
  if(isset($_GET["cui_mecanico"])){
    if(isset($_POST["eliminar"])){
        echo "se va a eliminar";
        eliminar_mecanico($_GET["cui_mecanico"]);
        ?>
        <script type="text/javascript">
        location.href="Mecanico-Read.php";
        </script>
        <?php
    }
    $usuario = query("Select * from empleado where cui = ".$_GET["cui_mecanico"].";");
    while ($datos = mysqli_fetch_array( $usuario )){
        $cui_anterior = $datos["cui"];
        $cui = $datos["cui"];
        $nombre = $datos["nombre"];
        $correo = $datos["correo"];
        $nit = $datos["nit"];
        $direccion = $datos["direccion"];
        $telefono = $datos["telefono"];
        $fechaContratacion = $datos["fechaContratacion"];
        $estado = $datos["estado"];
        $nickname = $datos["nickname"];
        $pass = $datos["pass"];
    }
  }
  if(isset($_POST["accept"])){
        $cui = $_POST["cui"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $nit = $_POST["nit"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $fechaContratacion = $_POST["fechaContratacion"];
        $estado = $_POST["estado"];
        if($estado=="Activo")
            $estado = 1;
        else if($estado=="De Vacaciones")
            $estado = 0;
        else if($estado=="Inactivo")
            $estado = -1;
        $nickname = $_POST["nickname"];
        $pass = $_POST["pass"];
        $retorno = update_mecanico($cui_anterior,$cui,$nombre,$correo,$nit,$direccion,$telefono,$fechaContratacion,$estado,$nickname,$pass);
        if($retorno!=""){
            $alerta = $retorno;
            $alerta_tipo = "\"alert alert-danger\"";
        }  else {
            $alerta_tipo = "\"hidden\"";
            $alerta = "";
        }
        if($cui != $cui_anterior)
        {
            ?>
            <script type="text/javascript">
            location.href="Mecanico-Read.php";
            </script>
            <?php
        }
  }
?>

<p style="text-align: center; font-size: 50px;"><span style="color: #ffffff;"><strong>Actualizar datos de <?php echo $nombre ?></strong></span></p>
<!-- Inicio -->
<div id="page-wrapper" >
            <div id="page-inner">
                 <!-- /. ROW  -->
                 <hr />
               <div class="row" style="float: center;">
                    <!-- Form Elements -->
                    <form role="form" method="post"> 
                    <div class= <?php echo $alerta_tipo; ?> >
                       <?php echo $alerta; ?>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $nombre ?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-4">
                                    <h3>Datos personales del mecanico</h3>
                                    <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>CUI</label>
                                            <input class="form-control" name = "cui" value=<?php echo "\"".$cui."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name = "nombre" value=<?php echo "\"".$nombre."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input class="form-control" name = "correo" value=<?php echo "\"".$correo."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>NIT</label>
                                            <input class="form-control" name = "nit" value=<?php echo "\"".$nit."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" name = "direccion" value=<?php echo "\"".$direccion."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input class="form-control" name = "telefono" value=<?php echo "\"".$telefono."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de contratacion</label>
                                            <input class="form-control" name = "fechaContratacion" value=<?php echo "\"".$fechaContratacion."\"";?>/>
                                        </div>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" name = "estado">
                                                <option <?php if($estado==1) echo "selected";?> >Activo</option>
                                                <option <?php if($estado==0) echo "selected";?> >De Vacaciones</option>
                                                <option <?php if($estado==-1) echo "selected";?> >Inactivo</option>
                                            </select>
                                        </div>
                                        <hr/>
                                        <h4>Datos para usuario del sistema</h4>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" name = "nickname" value=<?php echo "\"".$nickname."\"";?> />
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input class="form-control" name = "pass" value=<?php echo "\"".$pass."\"";?>/>
                                        </div>
                                        <button type="reset" name="cancel" class="btn btn-default">Cancelar</button>
                                        <button type="submit" name="accept" class="btn btn-success">Actualizar Mecánico</button>
                                        <br/>
                                        <hr/>
                                        <br/>

                                        <button type="submit" name="eliminar" class="btn btn-danger">Eliminar Mecánico</button>
                                    <!-- </form> -->

                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                     <!-- End Form Elements -->
                </div>
            </div>
            </div>
<!-- Fin -->


<?php
  include "Encabezado/abajo.php";
?>