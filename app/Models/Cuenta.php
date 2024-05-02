<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    private float $saldo;

    public function __construct()
    {
        // Inicializa el saldo de la cuenta bancaria a cero al crear una nueva instancia.
        $this->saldo = 0.0;
    }

    public function getSaldo(): float
    {
        // Devuelve el saldo actual de la cuenta bancaria.
        return $this->saldo;
    }

    /**
     * Realiza un ingreso en la cuenta bancaria.
     * 
     * @param int $cantidad La cantidad a ingresar.
     * @return void
     */
    public function ingresar(int $cantidad): void
    {
        // Verifica que la cantidad ingresada sea mayor que cero y no tenga más de dos decimales antes de realizar el ingreso.
        // Esto asegura que la operación de ingreso sea válida y que no se ingresen valores inválidos en la cuenta.
        if ($cantidad > 0 && round($cantidad, 2) == $cantidad) {
            $this->saldo += $cantidad;
        }
    }

    /**
     * Realiza una retirada de la cuenta bancaria.
     * 
     * @param int $cantidad La cantidad a retirar.
     * @return void
     */
    public function retirar(int $cantidad): void
    {
        // Resta la cantidad especificada del saldo actual de la cuenta.
        // No se realizan verificaciones adicionales en este método, ya que se asume que la operación de retirada siempre es válida.
        $this->saldo -= $cantidad;
    }
}
