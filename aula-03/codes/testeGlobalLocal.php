<?php
  $a = 5;

  function soma($i, $f){
    $k = $f;
    echo "Imprimindo o valor de k dentro da funcion\n";
    echo $k;
    echo "\n";
    return ($i + $k);
  }

  echo soma($a,3);
  echo "\n";
  echo "Imprimindo o valor de a\n";
  echo $a;
  echo "\n";
  echo "Imprimindo valor de k fora da function\n";
  echo $k;