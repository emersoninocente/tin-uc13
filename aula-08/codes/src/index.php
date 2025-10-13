<?php
require __DIR__ . '/Model/Genero.php';
require __DIR__ . '/Model/Titulo.php';
require __DIR__ . '/Model/Filme.php';
require __DIR__ . '/Model/Serie.php';
require __DIR__ . '/Controller/CalculaMaratona.php';

$filme = new Filme("O Senhor dos Anéis", 2001, Genero::FANTASIA, "New Line Cinema",180);
$filme->avalia(8);
$filme->avalia(9);
$filme->avalia(10);
//var_dump($filme);

$serie = new Serie("Breaking Bad", 2008, Genero::DRAMA, "Sony Pictures Television", 5, 13, 47);
$serie->avalia(10);
$serie->avalia(9);
$serie->avalia(8);
$serie->avalia(7);
//var_dump($serie);

//echo "O Filme " . $filme->nome . " tem Média de avaliações: " . $filme->media() . PHP_EOL;
//echo "A Série " . $serie->nome . " tem Média de avaliações: " . $serie->media() . PHP_EOL;

$filme = new Filme("O Senhor dos Anéis", 2001, Genero::FANTASIA, "New Line Cinema",180);
$serie = new Serie("Breaking Bad", 2008, Genero::DRAMA, "Sony Pictures Television", 5, 13, 47);

$calc = new CalculaMaratona();
$calc->inclui($filme);
$calc->inclui($serie);

$duracao = $calc->duracao();
echo "Duração total da maratona: $duracao minutos" . PHP_EOL;

?>