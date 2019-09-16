<?php
  include "Encabezado/arriba.php";
  include "../BaseDatos/Consultas.php";
  include "Mecanico.php";
  $alerta_tipo = "\"hidden\"";
  $alerta = "";
  if(isset($_POST["accept"])){
  		$cui = $_POST["cui"];
		$nombre = $_POST["nombre"];
		$correo = $_POST["correo"];
		$nit = $_POST["nit"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$nickname = $_POST["nickname"];
		$pass = $_POST["pass"];
		create_mecanico($cui,$nombre,$correo,$nit,$direccion,$telefono,$nickname,$pass);
  }
?>

<p style="text-align: center; font-size: 50px;"><span style="color: #ffffff;"><strong>Agregar nuevo mec&aacute;nico</strong></span></p>
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
                            Nuevo Mecánico
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-4">
                                    <h3>Datos Personales del nuevo Mecánico</h3>
                                    <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>CUI</label>
                                            <input class="form-control" name = "cui"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" name = "nombre"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Correo</label>
                                            <input class="form-control" name = "correo"/>
                                        </div>
                                        <div class="form-group">
                                            <label>NIT</label>
                                            <input class="form-control" name = "nit"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Dirección</label>
                                            <input class="form-control" name = "direccion"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input class="form-control" name = "telefono"/>
                                        </div>
                                        <hr/>
                                        <h4>Datos para usuario del sistema</h4>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" name = "nickname"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input class="form-control" name = "pass"/>
                                        </div>
                                        <button type="reset" name="cancel" class="btn btn-default">Cancelar</button>
                                        <button type="submit" name="accept" class="btn btn-danger">Agregar Mecánico</button>
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