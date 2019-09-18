<?php
include_once (__DIR__."\..\..\Administrador\Mecanico.php");
include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
//use PHPUnit\Framework\TestCase;
//class PruebaMecanicos extends TestCase
class PruebaMecanicos extends PHPUnit_Framework_TestCase
{
  public function iniciarPrueabas(){
    $this->testMecanicos();
  }
  public function testMecanicos(){
    //Eliminar mecanico pero no existe
    $this->assertSame(true, eliminar_mecanico(2658762580403));
    //crear
    $this->assertSame(true,crear_mecanico(30,"Treinta","tt","1234","dire","56565","ttnick","1234"));
    //eliminar, si existe
    $this->assertSame(true, eliminar_mecanico(1));
    //actualizar mecanico
    $this->assertSame(true,actualizar_mecanico(30,1,"cero","cero","0","cero","00","2019-02-01",1,"cero","1234"));
    //pruebas falsas
    $this->assertSame(false, eliminar_mecanico(null));
    $this->assertSame(false,crear_mecanico(null,"Treinta","tt","1234","dire","56565","ttnick","1234"));
    $this->assertSame(false,crear_mecanico("hola","Treinta","tt","1234","dire","56565","ttnick","1234"));
    $this->assertSame(false,actualizar_mecanico(30,null,"cero","cero","0","cero","00","2019-02-01",1,"cero","1234"));
    //$this->assertSame(false,actualizar_mecanico(30,"null","cero","cero","0","cero","00","2019-02-01",1,"cero","1234"));

  }
}


?>
