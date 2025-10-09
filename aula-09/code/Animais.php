<?php
abstract class Animal 
{
    // Usamos 'protected' para que as classes filhas possam acessar o nome.
    // O mundo exterior não pode. Isso é encapsulamento de dados.
    protected string $nome;

    public function __construct(string $param01) 
    {
        $this->nome = $param01; // O nome é definido na criação e protegido.
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

// Esta funcao decladara abaixo esta fora da ideia de OOP, é uma declaracao
// procedural.
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