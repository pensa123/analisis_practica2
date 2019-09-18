<?php


use PHPUnit\Framework\TestCase;

class PruebaVehiculo extends TestCase
//class PruebaVehiculo extends PHPUnit_Framework_TestCase
{
    public function CorrerTodo()
    { 
        $this->testCrearVehiculo();
    }

    public function testCrearVehiculo()
    {
        include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");
        
        $this->assertNotEmpty(crearVehiculo("p055chk", "kia" , "pop" , 1999) );
    }
}
