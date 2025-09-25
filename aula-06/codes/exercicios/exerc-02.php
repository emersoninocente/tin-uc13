<?php
  $saldo = 1000;

  function verSaldo() {
    global $saldo;
    echo "O saldo é R$ $saldo";
  }

  function depositar($depositar) {
    global $saldo;
    $saldo += $depositar;
    verSaldo();
  }

  function sacar($saque) {
    global $saldo;
    if ($saldo < $saque) {
      echo "Saldo insuficiente\n";
      verSaldo();
    } else {
      $saldo -= $saque;
      verSaldo();
    }
  }

  sacar(1350);