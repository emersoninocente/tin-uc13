<?php
   // Funções de manipulação de strings
   $texto = "  Olá, Mundo PHP!  ";
   echo "\n";
   echo strlen($texto); // 19 - comprimento da string
   echo "\n";
   echo trim($texto); // "Olá, Mundo PHP!" - remove espaços
   echo "\n";
   echo strtoupper($texto); // "  OLÁ, MUNDO PHP!  "
   echo "\n";
   echo strtolower($texto); // "  olá, mundo php!  "
   echo "\n";
   echo ucfirst(trim($texto)); // "Olá, mundo php!"
   echo "\n";
   echo ucwords(trim($texto)); // "Olá, Mundo Php!"
   echo "\n";
   
   // Busca e substituição
   $frase = "PHP é uma linguagem de programação";
   echo str_replace("PHP", "PHP 8", $frase);
   echo "\n";
   echo strpos($frase, "linguagem"); // 11 - posição da palavra
   echo "\n";
   
   // Divisão e junção
   $palavras = explode(" ", $frase);
   print_r($palavras); // Array com as palavras
   echo "\n";
   echo implode("-", $palavras); // Junta com hífen
   echo "\n";

   // Substring
   echo substr($frase, 0, 3); // "PHP"
   echo "\n";
   echo substr($frase, -13); // "programação"