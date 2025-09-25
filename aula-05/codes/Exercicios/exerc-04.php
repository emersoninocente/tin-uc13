<?php
  $notas = [8.5, 7.5, 9, 5, 7, 4.5];
  $i = 0; // Variavel para identificar o tamanho do array poderiamos usar o sizeof($notas) ou count($notas)
  $somaNotas = 0;
  $menor = 0;
  $maior = 0;

  foreach ($notas as $valor) {
    $i++;
    $somaNotas += $valor;
    // Teste menor valor
    if($menor == 0){
        $menor =  $valor;
    } elseif ($menor > $valor) {
        $menor = $valor;
    }
    // Teste maior valor
    if ($maior < $valor) {
        $maior = $valor;
    }
  }
  $mediaNotas = $somaNotas / $i;
  echo "A média das notas é " . $mediaNotas .", a menor nota é $menor enquanto a maior nota é $maior.\n";