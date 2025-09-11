<?php

  $numero_a = 10;
  $numero_b = "10";
  
  echo "Comparando 10 e '10':\n";
  echo "Com == (Igual): ";
  var_dump($numero_a == $numero_b); // Saída: bool(true) -> O PHP converte a string "10" para número antes de comparar.
  
  echo "Com === (Idêntico): ";
  var_dump($numero_a === $numero_b); // Saída: bool(false) -> O valor é o mesmo, mas os tipos (integer e string) são diferentes.

?>