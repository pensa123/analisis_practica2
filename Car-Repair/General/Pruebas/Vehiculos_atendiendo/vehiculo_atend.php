<?php



include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");

//use PHPUnit\Framework\TestCase;
//class PruebaVehiculo extends TestCase
class PruebaVehiculo extends PHPUnit_Framework_TestCase
{

    public function CorrerTodo()
    {
        $this->testquitarLista();
    }

    public function testquitarLista()
    {
        $this->assertNotEmpty(quitarLista("1"));
    }
}
