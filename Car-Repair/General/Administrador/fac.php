<?php
  include "Encabezado/arriba.php";
  include "../BaseDatos/Consultas.php";
?>

<p style="text-align: center; font-size: 50px;"><span style="color: #ffffff;"><strong>Facturación</strong></span></p>
<a class="btn btn-success" href="fac-create.php">+ Agregar Facturación</a>
    
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Facturas de Car Repair
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $consulta = query("select * from factura;");
                                        //$consulta = query("select * from empleado where tipo = 1;");
                                        while ($mecanicos = mysqli_fetch_array( $consulta )){
                                            
                                            ?>
                                            <tr>
                                            <td><?php echo $mecanicos["id"] ?></td>
                                            <td><?php echo $mecanicos["empleado"] ?></td>
                                            <td><?php echo $mecanicos["cliente"] ?></td>
                                            <td><?php echo $mecanicos["servicio"] ?></td>
                                            <td><?php echo $mecanicos["descripcion"] ?></td>
                                            <td><?php echo $mecanicos["precio"] ?></td>
                                            <td><?php echo $mecanicos["subtotal"] ?></td>
                                            <td><?php echo $mecanicos["fecha"] ?></td>
                                            <td><?php echo $mecanicos["tipo"] ?></td>
                                            <td><?php echo $mecanicos["estado"] ?></td>
                                            <!--<td><a class="btn btn-success" href="Mecanico-Update.php?cui_mecanico=<?php echo $mecanicos["cui"] ?>">Editar</a></td>-->
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
                     <!-- 
                         id bigint primary key,
                        empleado varchar(255),
                        cliente varchar(255),
                        servicio varchar(255),
                        descripcion varchar(255),
                        precio varchar(255),
                        subtotal varchar(255),
                        fecha date,
                        tipo int,  
                        estado int
                      -->
                

<?php
  include "Encabezado/abajo.php";
?>