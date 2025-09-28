# 🧑‍🎨 - Aula 07

## 🎯 - Objetivos
 - Apresentação da Programação Orientada à Objetos
 - Identificar os 4 pilares da OOP
 - Classes e Métodos

## 🚀 - Orientação à objetos
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Já aprendemos o básico da linguagem até o momento, sintaxe da linguagem, sabe o que são variáveis, estruturas de controle, funções, arrays (matrizes) e strings (cadeias de caracteres). Agora aprenderemos uma nova forma de pensar nosso código usando a orientação à objetos. Vamos organizar nosso código, unir funcionalidades, comportamento em uma nova estrutura. \
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vamos criar nossos tipos de dados, além dos tipos primitivos existentes na linguagem. A orientação à objetos possui quatro pilares fundamentais: **encapsulamento**, **herança**, **polimorfismo** e a **abstração**.

### Encapsulamento
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O encapsulamento nos permite esconder detalhes internos de uma classe e expor apenas o que se faz necessário por meio de métodos públicos. Isto proteje o  estado do objeto contra modificações indevidas, promove coesão e facilita a manutenção.

  #### Exemplo:
  ```php
    class ContaBancaria {
        private string $titular;
        private float $saldo;
    
        public function __construct(string $titular, float $saldoInicial) {
            $this->titular = $titular;
            $this->saldo = $saldoInicial;
        }
    
        public function depositar(float $valor): void {
            if ($valor > 0) {
                $this->saldo += $valor;
            }
        }
    
        public function sacar(float $valor): bool {
            if ($valor > 0 && $valor <= $this->saldo) {
                $this->saldo -= $valor;
                return true;
            }
            return false;
        }
    
        public function getSaldo(): float {
            return $this->saldo;
        }
    
        public function getTitular(): string {
            return $this->titular;
        }
    }
  ```
  - Temos as propriedades privadas **titular** e **saldo** que são protegidas de acesso externo direto. Isto evita que sejam alteradas de forma arbitraria. Os métodos públicos **depositar()**, **sacar()**, **getSaldo()** e **getTitular()** que podem manipular e expor os dados de forma segura.

### Herança
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A herança permite que uma classe (subclasse) **reutilize** e **especialize** o comportamento de outra classe (superclasse). Isso promove **reuso**, **organização hierárquica** e **polimorfismo**.

  #### Exemplo:
  ```php
    // Classe base (superclasse)
    class Funcionario {
        protected string $nome;
        protected float $salario;
    
        public function __construct(string $nome, float $salario) {
            $this->nome = $nome;
            $this->salario = $salario;
        }
    
        public function getNome(): string {
            return $this->nome;
        }
    
        public function calcularBonus(): float {
            return $this->salario * 0.10; // bônus padrão de 10%
        }
    }
    
    // Classe derivada (subclasse)
    class Gerente extends Funcionario {
        private float $bonusExtra;
    
        public function __construct(string $nome, float $salario, float $bonusExtra) {
            parent::__construct($nome, $salario); // chama o construtor da superclasse
            $this->bonusExtra = $bonusExtra;
        }
    
        // Sobrescreve o método da superclasse
        public function calcularBonus(): float {
            return parent::calcularBonus() + $this->bonusExtra;
        }
    }
  ```
  - A clase **Funcionario** é a classe pai ou base, a classe **Gerente** herda tudo de **Funcionário** e especializa o calculo do bônus.

  ```php
    $funcionario = new Funcionario("João das Galinhas", 5000);
    echo $funcionario->getNome(); // João das Galinhas
    echo $funcionario->calculaBonus(); // 500

    $gerente = new Gerente("Emerson", 10000, 1500);
    echo $gerente->getNome(); // Emerson
    echo $gerente->calcularBonus(); // 2500> 
  ```

### Polimorfismo
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Polimorfismo significa “muitas formas”. Na orientação a objetos, ele permite que **objetos diferentes respondam de maneira distinta ao mesmo método**.

  #### Exemplo:
  ```php
    abstract class Animal {
        abstract public function emitirSom(): string;
    }
    
    class Cachorro extends Animal {
        public function emitirSom(): string {
            return "Au au!";
        }
    }
    
    class Gato extends Animal {
        public function emitirSom(): string {
            return "Miau!";
        }
    }
    
    function ouvirAnimal(Animal $animal): void {
        echo $animal->emitirSom() . PHP_EOL;
    }
    
    ouvirAnimal(new Cachorro()); // Au au!
    ouvirAnimal(new Gato());     // Miau!
  ```

### Abstração
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A abstração consiste em isolar as características essenciais de um objeto, escondendo detalhes de implementação eexpondo apenas o que é relevante para o uso. No PHP, isso é feito principalmente com classes abstratas e métodos abstratos:
 - Uma classe abstrata não pode ser instanciada diretamente, serve como modelo.
 - Um método abstrato é declarado, mas não implementado; as subclasses são obrigadas a fornecer a implementação.

  #### Exemplo:
  ```php
    // Classe abstrata: define o "contrato" e comportamento comum
    abstract class Forma {
        protected string $nome;
    
        public function __construct(string $nome) {
            $this->nome = $nome;
        }
    
        public function getNome(): string {
            return $this->nome;
        }
    
        // Método abstrato: cada forma deve implementar sua própria área
        abstract public function calcularArea(): float;
    }
    
    // Subclasse: Retângulo
    class Retangulo extends Forma {
        public function __construct(private float $largura, private float $altura) {
            parent::__construct("Retângulo");
        }
    
        public function calcularArea(): float {
            return $this->largura * $this->altura;
        }
    }
    
    // Subclasse: Círculo
    class Circulo extends Forma {
        public function __construct(private float $raio) {
            parent::__construct("Círculo");
        }
    
        public function calcularArea(): float {
            return pi() * ($this->raio ** 2);
        }
    }
  ```

## 📌 - Criando a estrutura OOP
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Já entendemos que a Programação Orientada à Objetos vêm para organizar o código e facilitar o desenvolvimento e a manutenção (vide documento [anexo](https://github.com/emersoninocente/tin-uc13/blob/main/aula-07/ManutencaoSoftware.pdf) - fonte: https://docs.ufpr.br/~ademirlp/Manutencao.pdf - acessado em 27/09/2025). Vamos conciliar a OOP com outro conceito que é o [MVC](https://www.devmedia.com.br/introducao-ao-padrao-mvc/29308) (Model-View-Controller), onde dividimos o código em três partes principais onde a **Model** é responsável pelo acesso aos dados e lógica de negócio, a **View** pela apresentação dos dados ao usuário e a **Controller** pela interação entre as outras duas camadas.

### Classes
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uma classe nada mais é do que um novo tipo. Vamos pensar em um filme, o que precisamos para identificar um filme?
 - Nome
 - Ano de lançamento
 - Gênero
 - Estúdio

### Métodos
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os métodos são os "comportamentos" dos objetos definidos em uma classe. Eles são chamados quando um objeto é criado, para realizar ações.

#### Exemplo

`src/Model/Filme.php`
```php
<?php
  class Filme {
      public string $name;
      public int $anoPublicacao;
      public float $media;
      public string $genero;
      public string $estudio;
      private array $notas = [];
  
      function avalia(float $nota): void {
        $this->notas[] = $nota;
      }
  
      function calculaMedia(): float {
        $total = array_sum($this->notas);
        $quantidade = count($this->notas);
        return $quantidade === 0 ? 0 : $total / $quantidade;
      }
  }
?>
```

`index.php`
```php
<?php
require __DIR__ . '/Model/Filme.php';

$filme = new Filme();
$filme->name = "O Senhor dos Anéis";
$filme->anoPublicacao = 2001;
$filme->genero = "Fantasia";
$filme->estudio = "New Line Cinema";

$filme->avalia(8);
$filme->avalia(9);
$filme->avalia(10);

var_dump($filme);

echo "Média de avaliações: " . $filme->calculaMedia() . PHP_EOL;
?>
```

## Método Construtor (étodos Mágicos)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;É um método chamado automaticamente pela linguagem e começa com dois *underlines* **__construct()** e tendo o nome específico. Tradicionalmente teriamos de criar métodos **getter** e **setter** para manipularmos as variáveis de nossa classe, usando o construtor podemos eliminar alguns **setter** e permanecendo assim apenas os **getter**. O que garante o encapsulamento e a segurança dos dados, além de deixar nosso código mais limpo e organizado. \
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Para conhecer mais sobre métodos mágicos, recomendo a leitura do artigo [Explorando métodos mágicos no PHP](https://dias.dev/2023-08-11-metodos-magicos-php/).

#### Exemplo

`src/Model/Filme.php`
```php
<?php
  class Filme {
    public array $notas = [];
    
    public function __construct(
      private string $nome,
      private int $anoPublicacao,
      private string $genero,
      private string $estudio        
    ) {
      $this->notas = [];
    }
    
    public function nome(): string {
      return $this->nome;
    }

    public function anoPublicacao(): int {
      return $this->anoPublicacao;
    }
      
    public function genero(): string {
      return $this->genero;
    }

    public function estudio(): string {
      return $this->estudio;
    }

    public function avalia(float $nota): void {
      $this->notas[] = $nota;
    }

    public function calculaMedia(): float {
      $total = array_sum($this->notas);
      $quantidade = count($this->notas);
      return $quantidade === 0 ? 0 : $total / $quantidade;
    }
  }
?>
```

`src/index.php`
```php
<?php
require __DIR__ . '/Model/Filme.php';

$filme = new Filme("O Senhor dos Anéis", 2001, "Fantasia", "New Line Cinema");

$filme->avalia(8);
$filme->avalia(9);
$filme->avalia(10);

var_dump($filme);

echo "Filme " . $filme->nome() . " tem Média de avaliações: " . $filme->calculaMedia() . PHP_EOL;
?>
```











## ✏️ - Exercícios
1) Levando em consideração o código abaixo:

```php
<?php
class Conta
{
    private int $saldoEmCentavos;
    private string $nomeTitular;
    private string $numeroConta;

    public function setSaldoEmCentavos(int $saldoEmCentavos): void
    {
        $this->saldoEmCentavos = $saldoEmCentavos;
    }

    public function getSaldoEmCentavos(): int
    {
        return $this->saldoEmCentavos;
    }

    public function setNomeTitular(string $nomeTitular): void
    {
        $this->nomeTitular = $nomeTitular;
    }

    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function setNumeroConta(int $numeroConta): void
    {
        $this->numeroConta = $numeroConta;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }
}
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Como podemos torná-lo um pouco mais robusto, impedindo que o saldo seja manipulado livremente, por exemplo? Altere o código da classe para que o saldo seja alterado somente através das operações de saque e depósito.