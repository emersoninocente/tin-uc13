<?php
  // Cria uma variavel com o valor da hora em formato BR
  date_default_timezone_set("America/Sao_Paulo");
  $hora = date("H:i");
  //echo $hora;

  // Cria uma nova variavel chamada mensagemPadrao com a atribuicao do valor ", seja bem-vindo ao PHP!"
  $mensagemPadrao = ", seja bem-vindo ao PHP!";

  // Teste se manhã
  if( (($hora) > "06:00") && (($hora) < "12:01") ){
    echo "Bom dia" . $mensagemPadrao;
  }

  // Teste se tarde
  if( (($hora) > "12:00") && (($hora) < "18:01") ){
    echo "Boa tarde" . $mensagemPadrao;
  }

  // Teste se noite
  if( (($hora) > "18:00") && (($hora) < "06:01") ){
    echo "Boa noite" . $mensagemPadrao;
  }