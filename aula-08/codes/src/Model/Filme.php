<?php
  class Filme extends Titulo {
      public function __construct(
        string $nome,
        int $anoLancamento,
        Genero $genero,
        string $estudio,
        public readonly int $duracaoMinutos
      ) {
        parent::__construct($nome, $anoLancamento, $genero, $estudio);
      }
      public function duracaoEmMinutos(): int
      {
          return $this->duracaoMinutos;
      }
  }
?>