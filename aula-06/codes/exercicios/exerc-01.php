<?php
  function soma($num01, $num02){
    return $num01 + $num02;
  }

  function subtracao($num01, $num02){
    return $num01 - $num02;
  }

  function multiplicacao($num01, $num02){
    return $num01 * $num02;
  }

  function divisao($num01, $num02){
    if ($num02 == 0) {
      return "Erro: Divisão por zero!";
    } else {
      return $num01 / $num02;
    }
  }

  var_dump(divisao(2, 0));
