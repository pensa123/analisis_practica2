<?php

class PruebaServicios extends PHPUnit_Framework_TestCase
{
  public function CorrerTodo(){
    $this->testCrearServicio();
    $this->testActualizarServicio();
    $this->testEliminarServicio();
    $this->testRegistrarServicio();
  }
  public function testCrearServicio(){
    //Crear servicio
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(true,$serv->CrearServicio("Prueba","Se rectifica si no existe algun daño dentro del motor"));
    $this->assertEquals(true,$serv->CrearServicio("Prueba Delantera","Se alinean las llantas delanteras del vehiculo"));
    //Fallas
    $this->assertEquals(false,$serv->CrearServicio("Prueba Delantera","Esta no tiene que insertarce"));
  }
  public function testActualizarServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $consulta="select id from servicio order by id desc limit 1;";
    $id=UElemento($consulta);
    $this->assertEquals(true,$serv->ActualizarServicio($id,"Cambio 1","Este es un cambio"));
    $this->assertEquals(true,$serv->ActualizarServicio($id,"Prueba Delantera","Se le cambia el aceite del mas fino"));
  }
  public function testEliminarServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $consulta="select id from servicio order by id desc limit 1;";
    $id=UElemento($consulta);
    $this->assertEquals(true,$serv->EliminarServicio($id));
    $id=UElemento($consulta);
    $this->assertEquals(true,$serv->EliminarServicio($id));
  }
  public function testRegistrarServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(true,$serv->CrearDetalleServicio("1","538FWX","2991120550101","2991120550101","Esta es una prueba de un servicio","2019-01-10"));
  }
}
?>
