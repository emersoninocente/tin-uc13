<?php
  function calcularMedia($n1, $n2, $n3) {
      $media = ($n1 + $n2 + $n3) / 3;
      return $media;
  }
  
  $media_aluno1 = calcularMedia(8, 7, 9);
  echo "A média do aluno 1 é: " . number_format($media_aluno1, 2) . "\n";
  
  // Aluno 2
  if (calcularMedia(4, 5, 4.5) >= 7) {
      echo "O aluno 2 foi aprovado.\n";
  } else {
      echo "O aluno 2 NÃO foi aprovado.\n";
  }
?>