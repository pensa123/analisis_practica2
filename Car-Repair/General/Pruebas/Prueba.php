<?php
class Prueba extends PHPUnit_Framework_TestCase
{
  public function test(){
    include "Login/PruebaLogin.php";
    $login=new PruebaLogin;
    $login->CorrerTodo();
  }
}
?>
