<?php

// Subclasse ContaCorrente
class ContaCorrente extends ContaBancaria {
    private const TAXA_SAQUE = 2.50; // taxa fixa por saque
    private float $tarifaMensal;

    public function __construct(string $titular, float $saldoInicial = 0.0, float $tarifaMensal = 10.0) {
        parent::__construct($titular, $saldoInicial);
        $this->tarifaMensal = $tarifaMensal;
    }

    // Sobrescreve o método sacar para incluir a taxa de saque
    public function sacar(float $valor): bool {
        $valorTotal = $valor + self::TAXA_SAQUE;
        if ($valorTotal <= $this->saldo) {
            $this->saldo -= $valorTotal;
            return true;
        }
        return false;
    }

    public function cobrarTarifaMensal(): void {
        if ($this->saldo >= $this->tarifaMensal) {
            $this->saldo -= $this->tarifaMensal;
        }
    }
}