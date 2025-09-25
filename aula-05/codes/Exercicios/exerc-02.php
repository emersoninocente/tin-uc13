<?php
  $peso = 80; // Em kg
  $altura = 1.75; // Em metros

  $imc = $peso / ($altura * $altura);
  echo $imc . "\n";

  if ($imc < 18.5) {
    echo "Abaixo do peso \n";
  } elseif ($imc >= 18.5 && $imc < 24.9) {
    echo "Peso normal \n";
  } elseif ($imc >= 25 && $imc < 29.9) {
    echo "Sobrepeso";
  } else {
    echo "Obsidade";
  }