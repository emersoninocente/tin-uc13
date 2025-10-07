<?php

class ContaBancaria {
    protected string $titular;
    protected float $saldo;

    public function __construct(string $titular, float $saldoInicial = 0.0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    public function depositar(float $valor): void {
        if ($valor > 0) {
            $this->saldo += $valor;
        }
    }

    public function sacar(float $valor): bool {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            return true;
        }
        return false;
    }

    public function consultarSaldo(): float {
        return $this->saldo;
    }
}