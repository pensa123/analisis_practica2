<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
include "../BaseDatos/Vehiculos.php";

$placa = ""; 
$marca = ""; 
$modelo = ""; 
$anio = ""; 
$edit = false; 

if(isset($_GET["add"])){
    crearVehiculo($_GET["placa"] , $_GET["marca"] , $_GET["modelo"] , $_GET["anio"]);
}else if(isset($_GET["edit"])){
    editVehiculo($_GET["placa"] , $_GET["marca"] , $_GET["modelo"] , $_GET["anio"]);
}else if(isset($_GET["ed"])){
    $consulta = obtenerVehiculo("placa = '". $_GET["ed"] . "';");
    while ($res = mysqli_fetch_array($consulta)) {
        $edit = true; 
        $placa = $res["placa"];
        $marca = $res["marca"];
        $modelo = $res["modelo"];
        $anio = $res["anio_fabricacion"];
    }
}else if(isset($_GET["el"])){
    eliminarVehiculo($_GET["el"]);
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


<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">Placa</label>
                <div class="col-sm-10">
                    <input type="text" name="placa" class="form-control-plaintext" <?php echo $edit ? "readonly" : ""; ?> value="<?php echo $placa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">Marca</label>
                <div class="col-sm-10">
                    <input type="text" name="marca" class="form-control-plaintext" value="<?php echo $marca; ?>">
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">Modelo</label>
                <div class="col-sm-10">
                    <input type="text" name="modelo" class="form-control-plaintext" value="<?php echo $modelo; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">Año</label>
                <div class="col-sm-10">
                    <input type="number" name="anio" class="form-control-plaintext" value="<?php echo $anio; ?>">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" name="<?php echo $edit ? "edit" : "add"; ?>" value="e" class="btn btn-primary mb-2"><?php echo $edit ? "Editar" : "Guardar"; ?></button>

</form>


<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista de vehiculos
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Anio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = obtenerVehiculo();
                        while ($res = mysqli_fetch_array($consulta)) {
                            ?>
                            <tr>
                                <td><?php echo $res["placa"] ?></td>
                                <td><?php echo $res["marca"] ?></td>
                                <td><?php echo $res["modelo"] ?></td>
                                <td><?php echo $res["anio_fabricacion"] ?></td>
                                <td>
                                    <a class="btn btn-info" href="crudvehiculo.php?ed=<?php echo $res["placa"]; ?>">Editar</a>
                                <!--
                                    <a class="btn btn-danger" href="crudvehiculo.php?el=<?php echo $res["placa"]; ?>">Eliminar</a>
                        -->
                                </td>

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