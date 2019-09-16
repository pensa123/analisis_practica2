<?php

class PruebaServicios extends PHPUnit_Framework_TestCase
{
  public function CorrerTodo(){
    $this->testCrearServicio();
  }
  public function testCrearServicio(){
    //Crear servicio
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(true,$serv->CrearServicio("Rectificacion de Vielas","Se rectifica si no existe algun daño dentro del motor"));
    $this->assertEquals(true,$serv->CrearServicio("Alineacion Delantera","Se alinean las llantas delanteras del vehiculo"));
    //Fallas
    $this->assertEquals(false,$serv->CrearServicio("Alineacion Delantera","Esta no tiene que insertarce"));
  }
}
?>
