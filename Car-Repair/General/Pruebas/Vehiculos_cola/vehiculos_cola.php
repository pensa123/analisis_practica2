<?php


use PHPUnit\Framework\TestCase;
//include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");
//class PruebaVehiculo extends TestCase

class PruebaVehiculoCola extends PHPUnit_Framework_TestCase
{

    public function CorrerTodo()
    {
        $this->testaddVehiculoCola();
        $this->testQuitarDeLaCola();
    }

    public function testaddVehiculoCola(){
        //                                    cliente , empleado , vehiculo , fecha_estimada, descripcion
        $this->assertNotEmpty(addVehiculoCola('2991120550101'  , '2991120550101'       , '538FWX' , '2019-09-18', 'El carro esta chocado del frente.'));
    }

    public function testQuitarDeLaCola(){
        $this->assertNotEmpty(quitarDeCola('1'));
    }
}
