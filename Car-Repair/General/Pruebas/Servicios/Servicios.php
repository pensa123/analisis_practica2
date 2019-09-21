<?php

class PruebaServicios extends PHPUnit_Framework_TestCase
{
  public function CorrerTodo(){
    $this->testCrearServicio();
    $this->testActualizarServicio();
    $this->testEliminarServicio();
    $this->testRegistrarServicio();
    $this->testEliminarDetalleServicio();
  }
  public function testCrearServicio(){
    //Crear servicio
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $this->assertEquals(true,$serv->CrearServicio("Prueba","Se rectifica si no existe algun daño dentro del motor","25"));
    $this->assertEquals(true,$serv->CrearServicio("Prueba Delantera","Se alinean las llantas delanteras del vehiculo","50"));
    //Fallas
    $this->assertEquals(false,$serv->CrearServicio("Prueba Delantera","Esta no tiene que insertarce","100"));
  }
  public function testActualizarServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $consulta="select id from servicio order by id desc limit 1;";
    $id=UElemento($consulta);
    $this->assertEquals(true,$serv->ActualizarServicio($id,"Cambio 1","Este es un cambio","10"));
    $this->assertEquals(true,$serv->ActualizarServicio($id,"Prueba Delantera","Se le cambia el aceite del mas fino","30"));
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
  public function testEliminarDetalleServicio(){
    include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
    $serv=new Servicio;
    $consulta="select id from detalleServicio order by id desc limit 1;";
    $id=UElemento($consulta);
    $this->assertEquals(true,$serv->EliminarDetalleServicio($id));
  }
}
?>
