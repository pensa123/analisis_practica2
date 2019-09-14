<?php
  include "Encabezado/arriba.php";
  include "../BaseDatos/Consultas.php";
?>

<p style="text-align: center; font-size: 50px;"><span style="color: #ffffff;"><strong>Mec&aacute;nicos</strong></span></p>
<a class="btn btn-success" href="Mecanico-Create.php">+ Agregar Mecánico</a>
    
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Mecánicos de Car Repair
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>CUI</th>
                                            <th>Nombre</th>
                                            <th>Nit</th>
                                            <th>Fecha de Contratación</th>
                                            <th>Estado</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $consulta = query("select * from empleado where tipo = 1;");
                                        while ($mecanicos = mysqli_fetch_array( $consulta )){
                                            $estado = $mecanicos["estado"] == 1 ? "Activo" : ($mecanicos["estado"] == 0 ? "De Vacaciones" : "Inactivo");
                                            ?>
                                            <tr>
                                            <td><?php echo $mecanicos["cui"] ?></td>
                                            <td><?php echo $mecanicos["nombre"] ?></td>
                                            <td><?php echo $mecanicos["nit"] ?></td>
                                            <td><?php echo $mecanicos["fechaContratacion"] ?></td>
                                            <td><?php echo $estado ?></td>
                                            <td><?php echo $mecanicos["correo"] ?></td>
                                            <td><?php echo $mecanicos["telefono"] ?></td>
                                            <td><a class="btn btn-success">Editar</a></td>
                                            <td><a class="btn btn-danger">Eliminar</a></td>
                                            </tr>
                                            <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                

<?php
  include "Encabezado/abajo.php";
?>