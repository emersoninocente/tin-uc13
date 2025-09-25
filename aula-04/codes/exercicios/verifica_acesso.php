<?php
  $idade = 19;
  $temIngresso = true;
  $podeEntrarEvento = false;

  if($idade > 18 && $temIngresso){
    $podeEntrarEvento = true;
  }

  var_dump($podeEntrarEvento);