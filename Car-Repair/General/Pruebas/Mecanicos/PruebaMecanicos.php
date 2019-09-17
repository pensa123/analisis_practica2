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
    //prueba crear mecanico
    $this->assertEquals("\"alert alert-danger\"", create_mecanico('3016252620302','Mecanico prueba','mecanico_prueba@correo.com','12653265','Direccion de prueba','77659563','mec_prue','1234'));
  }
}


?>
