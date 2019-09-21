<?php

class Prueba extends PHPUnit_Framework_TestCase
{

  public function test(){
    require "Login/PruebaLogin.php";
    require "Servicios/Servicios.php";
    require "Mecanicos/PruebaMecanicos.php";

    require "Vehiculos/pruebaVehiculo.php";
    require "Vehiculos_cola/vehiculos_cola.php";
    require "Vehiculos_atendiendo/vehiculo_atend.php";

    $login=new PruebaLogin;
    $login->CorrerTodo();
    //servicios
    $serv=new PruebaServicios;
    $serv->CorrerTodo();
    $mecanicos=new PruebaMecanicos();
    $mecanicos->iniciarPrueabas();

    //vehiculos
    $pvehiculo = new PruebaVehiculo();
    $pvehiculo->CorrerTodo();
    $pvehiculoAtt = new PruebaVehiculoAttend();
    $pvehiculoAtt->CorrerTodo();
    $pvehiculoCola = new PruebaVehiculoCola();
    $pvehiculoCola ->CorrerTodo();
  }
}
?>
