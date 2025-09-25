<?php
  // Funções de data e hora
  echo date('Y-m-d H:i:s'); // 2024-03-15 14:30:22
  echo "\n";
  echo date('d/m/Y'); // 15/03/2024
  echo "\n";
  echo date('l, F j, Y'); // Friday, March 15, 2024
  echo "\n";
  
  // Timestamp
  $timestamp = time(); // Timestamp atual
  $dataEspecifica = mktime(0, 0, 0, 12, 25, 2024); // 25/12/2024
  
  // Formatação personalizada
  $agora = new DateTime();
  echo $agora->format('Y-m-d H:i:s');
  echo "\n";
  
  // Adição/subtração de tempo
  $proximaSemana = new DateTime();
  $proximaSemana->add(new DateInterval('P7D')); // +7 dias
  echo $proximaSemana->format('d/m/Y');
  echo "\n";

  // Diferença entre datas
  $nascimento = new DateTime('1990-05-15');
  $hoje = new DateTime();
  $idade = $hoje->diff($nascimento);
  echo $idade->y . " anos";
  echo "\n";
  // Validação de data
  if (checkdate(2, 29, 2024)) {
      echo "Data válida!";
  }