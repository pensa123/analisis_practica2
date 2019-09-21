<?php
include "Encabezado/arriba.php";
include "BaseDatos/Consultas.php";
include "BaseDatos/Clientes.php";

//$cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit

$cui = ""; 
$nombre = ""; 
$nickname = ""; 
$correo = ""; 
$pass = "";
$direccion = "";
$telefono = "";
$nit = "";
$edit = false; 


if(isset($_GET["add"])){
  //function crearCliente($cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit)
    crearCliente($_GET["cui"] , $_GET["nombre"] , $_GET["nickname"] , $_GET["correo"] , $_GET["pass"] , $_GET["direccion"] , $_GET["telefono"] , $_GET["nit"]);
}else if(isset($_GET["edit"])){
  //function editCliente($cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit)
    editCliente($_GET["cui"] , $_GET["nombre"] , $_GET["nickname"] , $_GET["correo"] , $_GET["pass"] , $_GET["direccion"] , $_GET["telefon"] , $_GET["nit"]);
}else if(isset($_GET["ed"])){
    $consulta = obtenerCliente("placa = '". $_GET["ed"] . "';");
    while ($res = mysqli_fetch_array($consulta)) {
        $edit = true; 
        $cui = $res["cui"];
        $nombre = $res["nombre"];
        $nickname = $res["nickname"];
        $correo = $res["correo"];
        $pass = $res["pass"];
        $direccion = $res["pass"];
        $telefono = $res["telefono"];
        $nit = $res["nit"];
    }
}else if(isset($_GET["el"])){
    eliminarCliente($_GET["el"]);
}

?>
<style>
    p,
    .wh {
        color: #FFFFFF;
        ;
    }
</style>
<h2 class="wh">Clientes</h2>

<!--$cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit-->
<form>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">CUI</label>
                <div class="col-sm-10">
                    <input type="text" name="cui" class="form-control-plaintext" <?php echo $edit ? "readonly" : ""; ?> value="<?php echo $cui; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" name="nombre" class="form-control-plaintext" value="<?php echo $nombre; ?>">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">nickname</label>
                <div class="col-sm-10">
                    <input type="text" name="nickname" class="form-control-plaintext" value="<?php echo $nickname; ?>">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">correo</label>
                <div class="col-sm-10">
                    <input type="text" name="correo" class="form-control-plaintext" value="<?php echo $correo; ?>">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">pass</label>
                <div class="col-sm-10">
                    <input type="pass" name="pass" class="form-control-plaintext" value="<?php echo $pass; ?>">
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">dirección</label>
                <div class="col-sm-10">
                    <input type="text" name="direccion" class="form-control-plaintext" value="<?php echo $direccion; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">telefono</label>
                <div class="col-sm-10">
                    <input type="number" name="telefono" class="form-control-plaintext" value="<?php echo $telefono; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label wh">nit</label>
                <div class="col-sm-10">
                    <input type="text" name="nit" class="form-control-plaintext" value="<?php echo $nit; ?>">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" name="<?php echo $edit ? "edit" : "add"; ?>" value="e" class="btn btn-primary mb-2"><?php echo $edit ? "Editar" : "Guardar"; ?></button>

</form>


<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Lista de clientes
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                         <!--$cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit--> 
                            <th>cui</th>
                            <th>nombre</th>
                            <th>nickname</th>
                            <th>correo</th>
                            <th>pass</th>
                            <th>direccion</th>
                            <th>telefono</th>
                            <th>nit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $consulta = obtenerCliente();
                        while ($res = mysqli_fetch_array($consulta)) {
                            ?>
                            <tr>
                              <!--$cui, $nombre, $nickname, $correo, $pass, $direccion, $telefono, $nit--> 
                                <td><?php echo $res["cui"] ?></td>
                                <td><?php echo $res["nombre"] ?></td>
                                <td><?php echo $res["nickname"] ?></td>
                                <td><?php echo $res["correo"] ?></td>
                                <td><?php echo $res["pass"] ?></td>
                                <td><?php echo $res["direccion"] ?></td>
                                <td><?php echo $res["telefono"] ?></td>
                                <td><?php echo $res["nit"] ?></td>
                                <td>
                                    <a class="btn btn-info" href="crudvehiculo.php?ed=<?php echo $res["nickname"]; ?>">Editar</a>
                                    <a class="btn btn-danger" href="crudvehiculo.php?el=<?php echo $res["nickname"]; ?>">Eliminar</a>

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