<?php


use PHPUnit\Framework\TestCase;

include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");

class PruebaVehiculo extends TestCase
//class PruebaVehiculo extends PHPUnit_Framework_TestCase
{

    public function CorrerTodo()
    {
        $this->testquitarLista();
        $this->testestadoVehiculo();
        $this->testmostrarAvances();
        $this->testIngresarAReparacion();
    }

    public function testIngresarAReparacion()
    {
        $this->assertNotEmpty(ingresaReparacion("222"));
    }

    public function testestadoVehiculo()
    {
        $this->assertNotEmpty(estadoVehiculo("222"));
    }

    public function testmostrarAvances()
    {
        $this->assertNotEmpty(mostrarAvances());
    }

    public function testquitarLista()
    {
        $this->assertNotEmpty(quitarLista("222"));
    }
}
