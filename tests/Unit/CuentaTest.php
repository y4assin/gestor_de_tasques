<?php

namespace Tests\Unit;
use App\Models\Cuenta;
use PHPUnit\Framework\TestCase;

class CuentaTest extends TestCase
{
    public function test_cuenta() {
        // Prueba básica para verificar si se puede crear una cuenta correctamente.
        $cuenta = new Cuenta();
        $this->assertInstanceOf(Cuenta::class, $cuenta);
    }
    
    public function test_saldo_inicial_cero() {
        // Verifica que el saldo inicial de una cuenta sea cero.
        $cuenta = new Cuenta();
        $this->assertEquals(0, $cuenta->getSaldo());
    }
    
    public function test_ingreso_dinero() {
        // Verifica que se pueda ingresar dinero en la cuenta y que el saldo se actualice correctamente.
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $this->assertEquals(100, $cuenta->getSaldo());
    }
    
    public function test_ingreso_multiple() {
        // Verifica que se puedan realizar múltiples ingresos en la cuenta y que el saldo se sume correctamente.
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->ingresar(3000);
        $this->assertEquals(3100, $cuenta->getSaldo());
    }
    
    public function test_ingreso_negativo() {
        // Verifica que no se pueda ingresar un monto negativo en la cuenta y que el saldo no se vea afectado.
        $cuenta = new Cuenta();
        $cuenta->ingresar(-100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }
    
    public function test_retiro_dinero() {
        // Verifica que se pueda retirar dinero de la cuenta y que el saldo se actualice correctamente.
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->retirar(100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }  
}
