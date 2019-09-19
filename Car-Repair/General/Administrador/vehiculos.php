<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
include "../BaseDatos/Vehiculos.php";

$title = "Estado de vehiculos.";
$where = "";
$d = 5;
if (isset($_GET["d"])) {
    $d = $_GET["d"];

    $where = " and ENTRADA_VEHICULO.estado = " . $d . ";";
    if ($d == 0) {
        $title = "Vehiculos en cola";
    } else if ($d == 1) {
        $title = "Vehiculos en proceso";
    } else if ($d == 2) {
        $title = "Vehiculos listos para entregar";
    } else if ($d == 3) {
        $title = "Vehiculos entregados.";
    }

    if (isset($_GET["as1"])) {
        quitarLista($_GET["as1"]);
    } else if (isset($_GET["as"])) {
        quitarDeCola($_GET["as"]);
    } else if (isset($_GET["des"])) {
        quitarDeCola($_GET["des"], -1);
    }
}

?>
<style>
    p,
    .wh {
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
<br />
<br />
<br />


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
                            <th>Cliente</th>
                            <th>Empleado encargado</th>
                            <th>Descripcion</th>
                            <th>Fecha ingreso</th>
                            <?php if ($d == 5) { ?>
                                <th>Fecha Salida estimada</th>
                                <th>Fecha salida</th>
                                <th>Estado</th>
                            <?php } else if ($d == 0 || $d == 2 || $d == 1) { ?>
                                <th>Fecha Salida estimada</th>
                                <?PHP
                                    if ($d == 2) {
                                        echo "<th>Trabajo terminado</th>";
                                    }
                                    ?>
                                <th>Accion</th>
                            <?php } else if ($d == 3) { ?>
                                <th>Fecha Salida</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $consulta = query("SELECT ENTRADA_VEHICULO.id , cliente.nombre as 'cliente' , empleado.nombre as 'empleado' 
                                        , descripcionDelProblema as 'desc' , fecha_ingreso, fecha_salidaEstimada , fecha_salida , ENTRADA_VEHICULO.estado 
                                        FROM ENTRADA_VEHICULO , cliente, empleado
                                        where ENTRADA_VEHICULO.cliente = cliente.cui and ENTRADA_VEHICULO.empleadoEncargado = empleado.cui 
                                         " . $where . ";");
                        while ($res  = mysqli_fetch_array($consulta)) {
                            ?>
                            <tr><?php
                                    echo "<td>" . $res["cliente"] . "</td>";
                                    echo "<td>" . $res["empleado"] . "</td>";
                                    echo "<td>" . $res["desc"] . "</td>";
                                    echo "<td>" . $res["fecha_ingreso"] . "</td>";


                                    if ($d == 5) {
                                        echo "<td>" . $res["fecha_salidaEstimada"] . "</td>";
                                        echo "<td>" . $res["fecha_salida"] . "</td>";
                                        $est = $res["estado"];
                                        $est2 = "Cancelado";
                                        if ($est == 0) {
                                            $est2 = "En cola";
                                        } else if ($est == 1) {
                                            $est2 = "En proceso";
                                        } else if ($est == 2) {
                                            $est2 = "Listo para entregar";
                                        } else if ($est == 3) {
                                            $est2 = "Entregado";
                                        }
                                        echo "<td>" . $est2 . "</td>";
                                    } else if ($d == 0 || $d == 2 || $d == 1) {
                                        echo "<td>" . $res["fecha_salidaEstimada"] . "</td>";
                                        if ($d == 0) {
                                            echo '<td>
                                        <a class="btn btn-info" href="vehiculos.php?d=0&as=' . $res["id"] . '">Siguiente</a>
                                        <a class="btn btn-danger" href="vehiculos.php?d=0&des=' . $res["id"] . '">Retorceder</a>
                                        </td>';
                                        } else {
                                            if ($d == 2) {
                                                echo "<td>" . $res["fecha_salida"] . "</td>";
                                            }
                                            echo '<td>
                                        <a class="btn btn-info" href="vehiculos.php?d=0&as1=' . $res["id"] . '">Siguiente</a>
                                        <a class="btn btn-danger" href="vehiculos.php?d=0&des=' . $res["id"] . '">Retorceder</a>
                                        </td>';
                                        }
                                    } else if ($d == 3) {
                                        echo "<td>" . $res["fecha_salida"] . "</td>";
                                    }
                                    ?></tr>
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