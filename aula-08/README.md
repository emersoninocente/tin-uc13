# 🚀 - Aula 08

## 🎯 - Objetivos
- Herança
- Poliformismo

## 🧩 - Seguindo com a Orientação à Objetos
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Na aula anterior exploramos dois conceitos da Orientação à Objetos, a **Abstração** e **Encapsulamento**. Nesta aula vamos explorar os outros conceitos.

### Herança
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Com a herança entre classes podemos extender uma classe pai ou base, fazendo com a classe filho herde atributos e métodos da classe pai e ainda possa especializar, criando novos atributos e métodos. Vamos ver o nosso exemplo. Vamos criar uma classe Titulo que vai ter todos os atributos e métodos comuns entre as classes Filme e Serie, onde cada uma das classes filho vai ter apenas o que precisa para especializar o Titulo para ser um Filme ou Serie.

#### Exemplo

`src/Model/Titulo.php`
```php
<?php
class Titulo {
    private array $notas;

    public function __construct(
        public readonly string $nome,
        public readonly int $anoLancamento,
        public readonly Genero $genero,
        public readonly string $estudio
    ) {
        $this->notas = [];
    }

    public function avalia(float $nota): void
    {
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }
}
```

`src/Model/Filme.php`
```php
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
  }
?>
```

`src/Model/Serie.php`
```php
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
  }
?>
```

`src/Model/Genero.php`
```php
<?php
enum Genero {
    case ACAO;
    case AVENTURA;
    case COMEDIA;
    case DRAMA;
    case FICCAO_CIENTIFICA;
    case FANTASIA;
    case TERROR;
    case ROMANCE;
    case SUSPENSE;
}
```

`src/index.php`
```php
<?php
require __DIR__ . '/Model/Genero.php';
require __DIR__ . '/Model/Titulo.php';
require __DIR__ . '/Model/Filme.php';
require __DIR__ . '/Model/Serie.php';

$filme = new Filme("O Senhor dos Anéis", 2001, Genero::FANTASIA, "New Line Cinema",180);
$filme->avalia(8);
$filme->avalia(9);
$filme->avalia(10);
var_dump($filme);

$serie = new Serie("Breaking Bad", 2008, Genero::DRAMA, "Sony Pictures Television", 5, 13, 47);
$serie->avalia(10);
$serie->avalia(9);
$serie->avalia(8);
$serie->avalia(7);
var_dump($serie);

echo "O Filme " . $filme->nome . " tem Média de avaliações: " . $filme->media() . PHP_EOL;
echo "A Série " . $serie->nome . " tem Média de avaliações: " . $serie->media() . PHP_EOL;
?>
```

> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Analisando os códigos acima temos vários pontos para serem tratados. Na classe **Titulo** declaramos os atributos comuns entre as demais classes como **public readonly**. Nas classes filho declaramos os atributos somente com o tipo pois já foram definidos na classe pai. Declaramos os atributos que especializam a classe e usamos o termo **parent** junto ao construtor para que sejam passados para a classe pai os atributos necessários. \
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No `index.php` invocamos os métodos existentes na classe pai, usando o nome das instâncias filho, pois como estas **herdam** tudo da classe pai, podemos chamar sem nenhum problema os métodos.

#### ✏️ - Exercícios
1) Crie uma classe `ContaBancaria` com métodos para realizar operações bancárias como `depositar()`, `sacar()` e `consultarSaldo()`. Em seguida, crie uma subclasse `ContaCorrente` que herda da classe `ContaBancaria`. Adicione um método específico para a subclasse, como `cobrarTarifaMensal()`, que desconta uma tarifa mensal da conta corrente. \
Além disso, no método `sacar()` da `ContaCorrente`, cobre uma taxa de saque também. Armazene essa taxa como uma constante da classe.

### Poliformismo
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Como visto na aula passada sobre este pilar da orientação à objetos, no poliformismo o mesmo objeto pode assumir várias formas, no nosso caso diferentes tipos e comportamentos. Vejamos o exemplo.

#### Exemplo

`src/Model/Titulo.php`
```php
<?php
class Titulo {
    private array $notas;

    public function __construct(
        public readonly string $nome,
        public readonly int $anoLancamento,
        public readonly Genero $genero,
        public readonly string $estudio
    ) {
        $this->notas = [];
    }

    public function avalia(float $nota): void
    {
        $this->notas[] = $nota;
    }

    public function media(): float
    {
        $somaNotas = array_sum($this->notas);
        $quantidadeNotas = count($this->notas);

        return $somaNotas / $quantidadeNotas;
    }

    public function duracaoEmMinutos(): int
    {
        return 0;
    }
}
```

`src/Model/Filme.php`
```php
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
```

`src/Model/Serie.php`
```php
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
```

`src/Model/Genero.php`
```php
<?php
enum Genero {
    case ACAO;
    case AVENTURA;
    case COMEDIA;
    case DRAMA;
    case FICCAO_CIENTIFICA;
    case FANTASIA;
    case TERROR;
    case ROMANCE;
    case SUSPENSE;
}
```

`src/Controller/calculaMaratona.php`
```php
<?php
class CalculaMaratona {
    // Atributos
    private int $duracaoMaratona = 0;

    public function inclui(Titulo $titulo): void {
        // Lógica para incluir uma nova maratona
        $this->duracaoMaratona += $titulo->duracaoEmMinutos();
    }

    public function duracao(): int {
        return $this->duracaoMaratona;
    }
}
?>
```

`src/index.php`
```php
<?php
require __DIR__ . '/Model/Genero.php';
require __DIR__ . '/Model/Titulo.php';
require __DIR__ . '/Model/Filme.php';
require __DIR__ . '/Model/Serie.php';
require __DIR__ . '/Controller/calculaMaratona.php';

$filme = new Filme("O Senhor dos Anéis", 2001, Genero::FANTASIA, "New Line Cinema",180);
$serie = new Serie("Breaking Bad", 2008, Genero::DRAMA, "Sony Pictures Television", 5, 13, 47);

$calc = new CalculaMaratona();
$calc->inclui($filme);
$calc->inclui($serie);

$duracao = $calc->duracao();
echo "Duração total da maratona: $duracao minutos" . PHP_EOL;
?>
```

> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Na classe `Titulo` declaramos um método `duracaoEmMinutos()` onde em cada uma das classes filho podemos especializar o cálculo conforme nossa necessidade. Na classe `CalculaMaratona` declaramos um método `inclui()` que espera receber um **Titulo** mas enviamos **Filme**, **Série** ou qualquer outro que possamos criar posteriormente.


#### ✏️ - Exercícios
1) Crie uma interface Pagavel com um único método getValorTotal(): float.
    - Crie três classes que implementam Pagavel:
      - ContratoTrabalho: Deve ter propriedades como salarioMensal. O método getValorTotal deve simplesmente retornar o salário.
      - Fatura: Deve ter propriedades como valor e imposto. O método getValorTotal deve retornar a soma do valor e do imposto.
      - Estagiario: Deve ter uma propriedade bolsaAuxilio. O método getValorTotal retorna esse valor.
    - Crie uma classe FolhaDePagamento.
      - Na classe FolhaDePagamento, crie um método calcularTotal(array $pagaveis). Este método deve:
        - Receber um array contendo exclusivamente objetos que implementam a interface Pagavel (você pode usar type hinting array $pagaveis).
        - Iterar sobre o array.
          - Para cada item, chamar o método getValorTotal() e somar o resultado a uma variável de total.
          - Ao final, retornar o valor total a ser pago.
    - Crie um script que:
      - Instancie vários objetos: dois ContratoTrabalho, uma Fatura e um Estagiario, com valores diferentes.
      - Coloque todos esses objetos em um único array.
      - Crie uma instância de FolhaDePagamento.
      - Chame o método calcularTotal passando o array e imprima o resultado final.