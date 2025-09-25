<?php
  $idade = 15;
  switch (true) {
    case ($idade < 16):
        echo "Não pode votar";
        break;
    case ($idade >=16 && $idade <18):
        echo "Voto facultativo";
        break;
    case ($idade > 70):
        echo "Voto facultativo";
        break;
    default:
        echo "Voto obrigatório";
        break;
    }
    if($idade < 16){
        echo "Não pode votar";
    } elseif (($idade >=16 && $idade < 18) || $idade > 70) {
        echo "Voto facultativo";
    } else {
        echo "Voto Obrigatório";
    }