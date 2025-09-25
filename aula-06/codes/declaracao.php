<?php
  function exibirBoasVindas($nome_usuario) {
      echo "Olá, $nome_usuario! Seja bem-vindo(a).\n";
  }
  
  exibirBoasVindas("Maria");
  exibirBoasVindas("João");
  
  function somar($num1, $num2) {
      $soma = $num1 + $num2;
      echo "A soma de $num1 e $num2 é: $soma\n";
  }
  
  somar(10, 5);
?>