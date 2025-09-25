<?php
  // Funções de manipulação de arrays
  $numeros = [1, 2, 3, 4, 5];
  $frutas = ["maçã", "banana", "laranja"];
  
  // Informações sobre o array
  echo count($numeros); // 5 - quantidade de elementos
  echo "\n";
  echo array_sum($numeros); // 15 - soma dos elementos
  echo "\n";
  echo max($numeros); // 5 - maior valor
  echo "\n";
  echo min($numeros); // 1 - menor valor
  echo "\n";
  
  // Adição e remoção
  array_push($frutas, "uva", "pera");
  var_dump($frutas);
  echo "\n";
  $ultimaFruta = array_pop($frutas); // Remove e retorna último
  array_unshift($frutas, "abacaxi"); // Adiciona no início
  $primeiraFruta = array_shift($frutas); // Remove e retorna primeiro
  
  // Busca e verificação
  if (in_array("banana", $frutas)) {
      echo "Banana está na lista!\n";
  }
  
  $posicao = array_search("laranja", $frutas);
  echo "Laranja está na posição: $posicao \n";
  
  // Ordenação
  sort($numeros); // Ordena valores
  var_dump($numeros);
  echo "\n";
  rsort($numeros); // Ordena decrescente
  var_dump($numeros);
  echo "\n";
  asort($frutas); // Ordena mantendo chaves
  ksort($frutas); // Ordena por chaves
  
  // Filtragem e mapeamento
  $pares = array_filter($numeros, fn($n) => $n % 2 == 0);
  var_dump($pares);
  echo "\n";
  $dobrados = array_map(fn($n) => $n * 2, $numeros);
  var_dump($dobrados);
  echo "\n";