<?php
  include "Encabezado/arriba.php";
  include "factura.php";
  $alerta_tipo = "\"hidden\"";
  $alerta = "";
  if(isset($_POST["accept"])){

        /*
        <th>Id</th>
        <th>empleado</th>
        <th>cliente</th>
        <th>servicio</th>
        <th>descripcion</th>
        <th>precio</th>
        <th>subtotal</th>
        <th>fecha</th>
        <th>tipo</th>
        <th>estado</th>
        */
  		$id = $_POST["id"];
		$empleado = $_POST["empleado"];
		$cliente = $_POST["cliente"];
		$servicio = $_POST["servicio"];
		$descripcion = $_POST["descripcion"];
		$precio = $_POST["precio"];
		$subtotal = $_POST["subtotal"];
        $fecha = $_POST["fecha"];
        $tipo = $_POST["tipo"];
        $estado = $_POST["estado"];
		$retorno = create_factura($id,$empleado,$cliente,$servicio,$descripcion,$precio,$subtotal,$fecha,$tipo,$estado);
        if($retorno!=""){
            $alerta = $retorno;
            $alerta_tipo = "\"alert alert-danger\"";
        } else {
            ?>
            <script type="text/javascript">
            location.href="fac-Create.php";
            </script>
            <?php
        }
  }
?>

<p style="text-align: center; font-size: 50px;"><span style="color: #ffffff;"><strong>Nueva factura</strong></span></p>
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
                            Factura
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-4">
                                    <h3>Datos</h3>
                                    <!-- <form role="form"> -->
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input class="form-control" name = "cui"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Empleado</label>
                                            <input class="form-control" name = "nombre"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Cliente</label>
                                            <input class="form-control" name = "correo"/>
                                        </div>
                                        <div class="form-group">
                                            <label>servicios</label>
                                            <input class="form-control" name = "nit"/>
                                        </div>
                                        <div class="form-group">
                                            <label>descripcion</label>
                                            <input class="form-control" name = "direccion"/>
                                        </div>
                                        <div class="form-group">
                                            <label>precio</label>
                                            <input class="form-control" name = "telefono"/>
                                        </div>
                                        <hr/>
                                        <div class="form-group">
                                            <label>subtotal</label>
                                            <input class="form-control" name = "nickname"/>
                                        </div>
                                        <div class="form-group">
                                            <label>fecha</label>
                                            <input class="form-control" name = "pass"/>
                                        </div>
                                        <div class="form-group">
                                            <label>tipo</label>
                                            <input class="form-control" name = "pass"/>
                                        </div>
                                        <div class="form-group">
                                            <label>estado</label>
                                            <input class="form-control" name = "pass"/>
                                        </div>
                                        
                                        <button type="reset" name="cancel" class="btn btn-default">Cancelar</button>
                                        <button type="submit" name="accept" class="btn btn-danger">Facturar</button>
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
  /*
        <th>Id</th>
        <th>empleado</th>
        <th>cliente</th>
        <th>servicio</th>
        <th>descripcion</th>
        <th>precio</th>
        <th>subtotal</th>
        <th>fecha</th>
        <th>tipo</th>
        <th>estado</th>
        */
?>