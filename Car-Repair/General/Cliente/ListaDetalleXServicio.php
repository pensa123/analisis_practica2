<?php
include "Encabezado/arriba.php";
include "../BaseDatos/Consultas.php";
if(isset($_GET["id"])){
  $id=$_GET["id"];
}
?>

<div class="panel panel-info" style="width: 110rem;">
  <div class="panel-heading">
    <h2 class="panel-title">Listado de servicios a su nombre</h2>
  </div>
  <div class="panel-body" >
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <td>
                <h4>Placa</h4>
              </td>

              <td>
                <h4>Empleado</h4>
              </td>
              <td>
                <h4>Nombre Servicio</h4>
              </td>
              <td>
                <h4>Descripcion</h4>
              </td>
              <td>
                <h4>Fecha</h4>
              </td>
            </tr>
          </thead>
          <tbody>
            <?php
            $consulta="select vehiculo.placa,empleado.nombre,servicio.nombre,detalleservicio.descripcion,detalleservicio.fecha,detalleServicio.id from vehiculo,empleado,cliente,detalleservicio ,servicio,entrada_vehiculo
            where entrada_vehiculo.id=detalleservicio.entrada_vehiculo and servicio.id=detalleservicio.servicio and detalleservicio.mecanico=empleado.cui
            and entrada_vehiculo.cliente=cliente.cui and cliente.cui=".$_SESSION["CUI"]." and detalleservicio.servicio=servicio.id and vehiculo.placa=entrada_vehiculo.vehiculo;";
            $resul=query($consulta);
            while ($cl = mysqli_fetch_array( $resul )){
              printf("<tr>");
              printf("<td>%s</td>",$cl[0]);
              printf("<td>%s</td>",$cl[1]);
              printf("<td>%s</td>",$cl[2]);
              printf("<td>%s</td>",$cl[3]);
              printf("<td>%s</td>",$cl[4]);
              //printf("<td>%s</td>",$cl[5]);
              //printf("<td>%s</td>",$cl[6]);

              printf("</tr>");
            }

            ?>
          </tbody>
        </table>
      </div>


    </div>
  </div>
  <?php
  include "Encabezado/abajo.php";
  ?>
