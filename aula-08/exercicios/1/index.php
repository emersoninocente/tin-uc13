<?php
require __DIR__ . '/ContaBancaria.php';
require __DIR__ . '/ContaCorrente.php';

$conta = new ContaCorrente("Emerson Inocente", 100.0);
$conta->depositar(50.0);
$conta->sacar(30.0); // será cobrado 30 + 2.50
$conta->cobrarTarifaMensal(); // desconta 10.0
echo "Saldo atual: R$ " . $conta->consultarSaldo() . "\n";