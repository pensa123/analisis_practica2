<?php
include (__DIR__."\..\..\BaseDatos\Consultas.php");
class PruebaLogin extends PHPUnit_Framework_TestCase
{
  public function CorrerTodo(){
    $this->testLogin();
  }
  public function testLogin(){
    //usuario normal
    $this->assertEquals(3,Loguear("marvin","123"));
    //Admin
    $this->assertEquals(2,Loguear("Admin1","123"));
    //Mecanico
    $this->assertEquals(1,Loguear("Mec1","123"));
    //Usuario no existente
    $this->assertNotEquals(1,Loguear("nouser","123"));

  }
}


?>
