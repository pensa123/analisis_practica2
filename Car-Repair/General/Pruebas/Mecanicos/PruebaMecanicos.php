<?php
include_once (__DIR__."\..\..\Administrador\Mecanico.php");
include_once (__DIR__."\..\..\BaseDatos\Consultas.php");
use PHPUnit\Framework\TestCase;
class PruebaMecanicos extends TestCase
{
  public function iniciarPrueabas(){
    $this->testMecanicos();
  }
  public function testMecanicos(){
    //prueba crear mecánico
    echo "\nEliminar si existe";
    $this->assertSame(true, eliminar_mecanico(2658762580403));
    echo "\nCrear";
    $this->assertSame(true,crear_mecanico(30,"Treinta","tt","1234","dire","56565","ttnick","1234"));
    echo "\nEliminar si existe";
    $this->assertSame(true, eliminar_mecanico(1));
    echo "\nActualizar";
    $this->assertSame(true,actualizar_mecanico(30,1,"cero","cero","0","cero","00","2019-02-01",1,"cero","1234"));
    //pruebas falsas
    echo "\nEliminar si existe";
    $this->assertSame(false, eliminar_mecanico(null));
    echo "\nCrear";
    $this->assertSame(false,crear_mecanico(null,"Treinta","tt","1234","dire","56565","ttnick","1234"));
    echo "\nActualizar";
    $this->assertSame(false,actualizar_mecanico(30,null,"cero","cero","0","cero","00","2019-02-01",1,"cero","1234"));

  }
}


?>
