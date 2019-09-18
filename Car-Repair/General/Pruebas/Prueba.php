<?php

class Prueba extends PHPUnit_Framework_TestCase
{

  public function test(){
    require "Login/PruebaLogin.php";
    require "Servicios/Servicios.php";
    $login=new PruebaLogin;
    $login->CorrerTodo();
    //servicios
    $serv=new PruebaServicios;
    $serv->CorrerTodo();
    $mecanicos=new PruebaMecanicos();
    $mecanicos->iniciarPrueabas();
  }
}
?>
