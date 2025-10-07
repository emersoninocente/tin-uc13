<?php
  class Serie extends Titulo {
      public function __construct(
        string $nome,
        int $anoLancamento,
        Genero $genero,
        string $estudio,
        public readonly int $temporadas,
        public readonly int $episodiosPorTemporada,
        public readonly int $minutosPorEpisodio
      ) {
        parent::__construct($nome, $anoLancamento, $genero, $estudio);
      }
      public function duracaoEmMinutos(): int
      {
          return $this->temporadas * $this->episodiosPorTemporada * $this->minutosPorEpisodio;
      }
  }
?>