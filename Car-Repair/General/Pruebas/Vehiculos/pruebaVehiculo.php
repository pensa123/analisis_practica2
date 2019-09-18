<?php


use PHPUnit\Framework\TestCase;
include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");
        
class PruebaVehiculo extends TestCase
//class PruebaVehiculo extends PHPUnit_Framework_TestCase
{
    
    public function CorrerTodo()
    { 
        $this->testElimVehiculo();
        $this->testCrearVehiculo();
    }

    public function testElimVehiculo(){

        $this->assertNotEmpty(eliminarVehiculo(('p055chk')));
    }

    public function testCrearVehiculo()
    {
        $this->assertNotEmpty(crearVehiculo("p055chk", "kia" , "pop" , 1999) );
    }
}
