<?php


use PHPUnit\Framework\TestCase;
include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");
        
class PruebaVehiculo extends TestCase
//class PruebaVehiculo extends PHPUnit_Framework_TestCase
{
    
    public function CorrerTodo()
    { 
        $this->testaddVehiculoCola();
        $this->testGetVehiculoscola();
        $this->testQuitarDeLaCola();
    }

    public function testaddVehiculoCola(){
        //cliente , empleado , vehiculo , fecha_estimada, descripcion
        $this->assertNotEmpty(addVehiculoCola('222' , '1' , 'p055chd' , '2019-09-18', 'El carro esta chocado del frente.'));
    }

    public function testGetVehiculoscola(){
        $this->assertNotEmpty(vehiculosCola());
    }

    public function testQuitarDeLaCola(){
        $this->assertNotEmpty(quitarDeCola('222'));
    }
}