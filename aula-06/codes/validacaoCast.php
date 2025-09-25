<?php
  // Funções de validação e conversão
  $email = "usuario@exemplo.com";
  $url = "https://www.exemplo.com";
  $ip = "192.168.256.1";
  
  // Validações
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email válido!\n";
  }
  
  if (filter_var($url, FILTER_VALIDATE_URL)) {
      echo "URL válida!\n";
  }
  
  if (filter_var($ip, FILTER_VALIDATE_IP)) {
      echo "IP válido!\n";
  }
  
  // Conversões de tipo
  $numero = "123.45";
  echo (int)$numero; // 123
  echo "\n";
  echo (float)$numero; // 123.45
  echo "\n";
  echo intval($numero); // 123
  echo "\n";
  echo floatval($numero); // 123.45
  echo "\n";
  
  // Verificações de tipo
  echo is_string($numero) ? "É string" : "Não é string";
  echo "\n";
  echo is_numeric($numero) ? "É numérico" : "Não é numérico";
  echo "\n";
  echo is_array($numero) ? "É array" : "Não é array";
  
  // Funções matemáticas
  echo round(123.456, 2); // 123.46
  echo "\n";
  echo ceil(123.1); // 124
  echo "\n";
  echo floor(123.9); // 123
  echo "\n";
  echo abs(-10); // 10
  echo "\n";
  echo pow(2, 3); // 8
  echo "\n";
  echo sqrt(16); // 4
  echo "\n";
  echo rand(1, 100); // Número aleatório entre 1 e 100
  echo "\n";