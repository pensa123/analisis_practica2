<?php


use PHPUnit\Framework\TestCase;
include_once(__DIR__ . "\..\..\BaseDatos\Vehiculos.php");
        
class PruebaVehiculo extends TestCase
//class PruebaVehiculo extends PHPUnit_Framework_TestCase
{
    
    public function CorrerTodo()
    { 
        $this->testCrearVehiculo();
        $this->testEditVehiculo();
        $this->testElimVehiculo();
        $this->testObtenerVehiculos();
    }


    public function testCrearVehiculo()
    {
        $this->assertNotEmpty(crearVehiculo("prueba", "kia" , "pop" , 1999) );
    }
    
    public function testEditVehiculo()
    {
        $this->assertNotEmpty(editVehiculo("prueba", "honda" , "civic" , 1999) );
    }

    
    public function testElimVehiculo(){
        
        $this->assertNotEmpty(eliminarVehiculo(('prueba')));
    }

    public function testObtenerVehiculos(){
        $this->assertNotEmpty(obtenerVehiculo());
    }
}
