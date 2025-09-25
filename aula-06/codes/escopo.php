<?php
  $nomeGlobal = "Global";
  echo "$nomeGlobal antes da function.\n";

  function minhaFuncao() {
      $nomeLocal = "Local\n";
      global $nomeGlobal; // Precisamos informar que usaremos a var global
      $nomeGlobal = "$nomeGlobal na function"; // Podemos recuperar e alterar o valor
      echo $nomeLocal; // Funciona
      echo "$nomeGlobal\n"; // Funciona
  }
  
  minhaFuncao();
  echo $nomeLocal; // ERRO
  echo "$nomeGlobal, mas fora da function.\n";
?>