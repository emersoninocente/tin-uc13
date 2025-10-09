# Aula 09

## Objetivos
- Encapsulamento
- Abstração

---
## Encapsulamento
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O encapsulamento é o mecanismo de agrupar dados (propriedades) e os métodos que manipulam esses dados dentro de uma única unidade (a classe), escondendo a complexidade e protegendo o estado interno de acessos externos indesejados.

**A Implementação do Encapsulamento no Código:**
1) `protected string $nome;`:
    - **Onde:** Na declaração da propriedade dentro da classe `Animal`.
    - **Como:** A palavra-chave `protected` é o coração do encapsulamento de dados aqui. Ela significa que a propriedade `$nome`:
      - É acessível pela própria classe `Animal`.
      - É acessível pelas classes filhas (`Cachorro`, `Gato`).
      - **NÃO** É acessível pelo código fora dessa hierarquia (como demonstrado pelo erro fatal ao tentar `$meuCachorro->nome = "Totó";`).
    - Estamos escondendo e protegendo o "estado interno" do objeto.
2) `public function __construct(string $nome)`:
    - **Onde:** No construtor da classe.
    - **Como:** Este método é parte da "interface pública" do objeto. Ele é a porta de entrada controlada para definir o estado interno (`$nome`) no momento da criação. O mundo exterior não define `$nome` diretamente; ele pede ao construtor para fazer isso de forma segura.
3) A Classe `Cachorro` como uma "Cápsula":
    - **Onde:** Na definição da classe `Cachorro`.
    - **Como:** A própria classe `Cachorro` atua como uma cápsula. Ela agrupa o dado que herdou (`$nome`) com o comportamento que o utiliza (`emitirSom`). A lógica `return $this->nome . " faz: Au au!";` está totalmente contida e protegida dentro da classe. O mundo exterior não precisa saber que o nome é concatenado com a string " faz: Au au!"; ele apenas chama `emitirSom()` e recebe o resultado final.

### Exemplo:
`Animal.php`

```php
<?php
abstract class Animal 
{
    // Usamos 'protected' para que as classes filhas possam acessar o nome.
    // O mundo exterior não pode. Isso é encapsulamento de dados.
    protected string $nome;

    public function __construct(string $nome) 
    {
        $this->nome = $nome; // O nome é definido na criação e protegido.
    }

    // A assinatura do método (a interface pública) continua a mesma.
    abstract public function emitirSom(): string;
}

class Cachorro extends Animal 
{
    public function emitirSom(): string 
    {
        // O método usa o estado interno (encapsulado) para compor sua resposta.
        return $this->nome . " faz: Au au!";
    }
}

class Gato extends Animal 
{
    public function emitirSom(): string 
    {
        return $this->nome . " faz: Miau!";
    }
}

function fazerAnimalEmitirSom(Animal $animal) 
{
    // Esta função NÃO MUDOU NADA.
    // Ela continua sem saber nada sobre a propriedade 'nome'.
    // Ela apenas usa a interface pública 'emitirSom()'.
    echo $animal->emitirSom() . "\n";
}

// Instanciamos os objetos fornecendo o estado inicial via construtor
$meuCachorro = new Cachorro("Rex");
$meuGato = new Gato("Frajola");

fazerAnimalEmitirSom($meuCachorro); // Saída: Rex faz: Au au!
fazerAnimalEmitirSom($meuGato);     // Saída: Frajola faz: Miau!

// TENTATIVA DE VIOLAR O ENCAPSULAMENTO (vai gerar um erro fatal)
// $meuCachorro->nome = "Totó"; // Fatal error: Cannot access protected property Cachorro::$nome
```

---
## Abstração
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A abstração consiste em focar nas características essenciais de um objeto, ignorando os detalhes irrelevantes ou complexos. Ela cria um "molde" ou um "contrato" que define o que um objeto deve ser ou fazer, sem se preocupar em como ele fará.

**A Implementação da Abstração no Código (seguindo códio acima):**
1) `abstract class Animal`:
    - **Onde:** Na própria declaração da classe.
    - **Como:** A palavra-chave `abstract` diz ao PHP: "Isto não é um animal de verdade, é a ideia de um animal". Ela cria um conceito. Você não pode instanciar um `Animal` genérico (`new Animal()`), porque a abstração está incompleta; ela precisa ser concretizada por uma classe filha. Estamos definindo o que é a essência de ser um animal no nosso sistema.
2) `abstract public function emitirSom(): string;`:
    - **Onde:** Na declaração do método dentro da classe abstrata.
    - **Como:** Esta é a parte mais importante da abstração de comportamento. Esta linha é uma regra obrigatória. Ela estabelece que:

            "Toda e qualquer classe que queira ser considerada uma extensão de `Animal` **DEVE**, obrigatoriamente, implementar um método chamado `emitirSom`. Este método não recebe parâmetros e precisa retornar uma string."

    - Note que não há corpo no método (`{...}`). A classe `Animal` não se importa como o som é emitido; ela apenas exige que a capacidade de emitir som exista. A abstração foca no "o quê" (a capacidade), não no "como" (a implementação).

---
## Exercícios
1) Processador de Arquivos de Vendas \
  **Cenário:** Você trabalha em um sistema de e-commerce que, ao final do dia, recebe múltiplos arquivos com os valores das vendas realizadas. O problema é que cada parceiro comercial envia o arquivo em um formato diferente (um em CSV, outro em TXT com um formato específico, etc.). Precisamos criar um sistema que processe todos esses arquivos e some o valor total das vendas, e que seja fácil de estender para novos formatos no futuro.

    **Exercício:** 
      1) Crie uma interface `Processavel` que define um contrato com um único método: `lerValores(): array`. Este método deve retornar um array de números (floats).

      2) Crie duas classes que implementam esta interface: \
        - `ArquivoCsv`: No construtor, ela receberá uma string que simula o conteúdo de um arquivo CSV (ex: `"150.50,300.00,99.99"`). O método `lerValores` deve quebrar a string pela vírgula e retornar um array de floats.
        - `ArquivoPipe`: No construtor, ela receberá uma string que simula um formato "pipe-separated" (ex: `"250.10|80.00|120.50"`). O método `lerValores` deve quebrar a string pelo pipe (`|`) e retornar um array de floats.
      3) Crie uma classe `ConsolidadorDeVendas`.
      4) A classe `ConsolidadorDeVendas` deve ter um método `processar(array $arquivos)` que recebe um array de objetos que implementam a interface `Processavel`.
      5) Este método deve iterar sobre cada arquivo, chamar o método `lerValores()` de cada um, e somar todos os valores retornados para calcular o total geral das vendas do dia.
      6) Crie um script para instanciar os arquivos, o consolidador e exibir o total geral.