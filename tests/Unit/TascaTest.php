<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;
use App\Models\Tasca;
use Exception;
use DateTime;

class TascaTest extends TestCase
{
    public function test_tasca_exemple(): void
    {
        // Prueba básica para verificar la creación de una tarea con valores esperados.
        $tasca = new Tasca("Tasca 1", "Descripció de la tasca 1", new DataTime("2021-10-10"), "Pendent");
        $this->assertEquals("Tasca 1", $tasca->getTitol());
        $this->assertEquals("Descripció de la tasca 1", $tasca->getDescripcio());

        $this->assertEquals($tasca->getEstat(), "Pendent");
        $this->assertTrue($tasca->getEstat() == "Pendent");
    }

    /**
     * Prueba para verificar un escenario de error.
     * @test
     * @return void
     */
    public function test_tasca_KO(): void
    {
        // Verifica que una tarea con estado "Acabat" no tenga el título "Tasca 1".
        $tasca = new Tasca("Tasca 2", "Descripció de la tasca 2", new DataTime("2024-02-10"), "Acabat");
        try {
            $this->assertEquals("Tasca 1", $tasca->getTitol());
            $this->assertTrue(false);
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }

    /**
     * Prueba para cambiar el estado de una tarea y verificar que se ha cambiado correctamente.
     * @test
     * @return void
     */
    public function test_tasca_canviarEstat(): void
    {
        // Verifica que se pueda cambiar el estado de una tarea correctamente.
        $tasca = new Tasca("Tasca 3", "Descripció de la tasca 3", new DataTime("2012-03-10"), "Pendent");
        $this->assertEquals("Pendent", $tasca->getEstat());
        $tasca->setEstat("Acabat");
        $this->assertEquals("Acabat", $tasca->getEstat());
    }

    /**
     * Prueba para verificar el método toString de una tarea.
     * @test
     * @return void
     */
    public function test_tasca_toString(): void
    {
        // Verifica que el método toString de una tarea devuelva el formato esperado.
        $tasca = new Tasca("Tasca 4", "Descripció de la tasca 4", new DataTime("1956-06-02"), "En progres");
        $this->assertEquals("Tasca:Tasca 4\nDescripció:Descripció de la tasca 4\nData límit:1956-06-02", $tasca->__toString());
    }
}
