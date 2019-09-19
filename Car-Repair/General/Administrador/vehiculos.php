<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";

$title = "Estado de vehiculos.";
$where = ""; 
if(isset($_GET["d"])){
    $d = $_GET["d"]; 
     
    $where = "where estado = ".$d.";";
    if($d == 0){
        $title = "Vehiculos en cola"; 
        
    } else if($d == 1){
        $title = "Vehiculos en proceso"; 
    }else if($d == 2){
        $title = "Vehiculos listos para entregar";
    }else if($d == 3){
        $title = "Vehiculos entregados."; 
    }
}

?>
<style>
    p , .wh{
        color: #FFFFFF;
        ;
    }
</style>
<h2 class="wh">VEHICULOS</h2>
<h3 class="wh"> Seleccionar que vehiculos desea ver </h3>
<div>
<nav>
    <ul class="menu">
        <li><a href="vehiculos.php">pela</a></li>
        <li><a href="vehiculos.php?d=0">En cola </a></li>
        <li><a href="vehiculos.php?d=1">En proceso </a></li>
        <li><a href="vehiculos.php?d=2">Terminados </a></li>
        <li><a href="vehiculos.php?d=3">Entregados al cliente </a></li>
    </ul>
</nav>
</div>
<br/>
<br/>
<br/>


<div class="container">
<a class="btn btn-success" href="addVCola.php">Agregar vehiculo a la cola</a>

<div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $title; ?>
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
                                            <th>Nit</th>
                                            <th>Dirección</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $consulta = query("select * from entrada_vehiculo ".$where .";");
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
                                            <td><?php echo $mecanicos["nit"] ?></td>
                                            <td><?php echo $mecanicos["direccion"] ?></td>
                                            <td><a class="btn btn-success" href="Mecanico-Update.php?cui_mecanico=<?php echo $mecanicos["cui"] ?>">Editar</a></td>
                                            </tr>
                                            <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
      
</div>



<?php
include "Encabezado/abajo.php";
?>