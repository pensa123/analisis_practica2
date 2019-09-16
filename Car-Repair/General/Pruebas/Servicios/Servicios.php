<?php

class PruebaServicios extends PHPUnit_Framework_TestCase
{
  public function CorrerTodo(){
    $this->testCrearServicio();
    $this->testActualizarServicio();
  }
  public function testCrearServicio(){
    //Crear servicio
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(false,$serv->CrearServicio("Rectificacion de Vielas","Se rectifica si no existe algun daño dentro del motor"));
    $this->assertEquals(false,$serv->CrearServicio("Alineacion Delantera","Se alinean las llantas delanteras del vehiculo"));
    //Fallas
    //$this->assertEquals(false,$serv->CrearServicio("Alineacion Delantera","Esta no tiene que insertarce"));
  }
  public function testActualizarServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(true,$serv->ActualizarServicio("1","Cambio 1","Este es un cambio"));
    $this->assertEquals(true,$serv->ActualizarServicio("1","Cambio de aceite fino","Se le cambia el aceite del mas fino"));
  }
}
?>
