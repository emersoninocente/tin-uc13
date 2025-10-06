# Aula 07 - B

## Objetivos
 - Identificar a visibilidade e acessibilidade dos modificadores de acesso `private`, `protected` e `public`.

 ### Public
> É o nível de acesso mais permissívo, **atributos** e **métodos** declarados como públicos podem ser acessados de **qualquer lugar** dentro de uma classe, subclasse ou fora da classe.

#### Exemplo:
```php
class Exemplo {
    public $nome = "Público";

    public function mostrarNome() {
        return $this->nome;
    }
}

$obj = new Exemplo();
echo $obj->nome; // Acessível diretamente
echo $obj->mostrarNome(); // Acessível diretamente
```

 ---
 ### Private
> É o nível de acesso menos permissívo, **metodos** e **atributos** declarados como privados podem ser acessados apenas **dentro da própria classe** onde foram definidos. Não são acessíveis por subclasses ou fora da classe.

#### Exemplo:
```php
class Exemplo {
    private $segredo = "Privado";

    private function mostrarSegredo() {
        return $this->segredo;
    }

    public function acessarSegredo() {
        return $this->mostrarSegredo(); // Acesso permitido dentro da classe
    }
}

$obj = new Exemplo();
// echo $obj->segredo; // Erro: Não acessível fora da classe
echo $obj->acessarSegredo(); // Correto: Acesso indireto
```

 ---

### Protected
> Este modificador permite acesso diretamente da classe ou de suas subclasses, portanto **metodos** e **atributos** criados como `protected` podem ser acessos da superclasse ou das suas subclasses.

#### Exemplo:
```php
class Pai {
    protected $heranca = "Protegido";

    protected function mostrarHeranca() {
        return $this->heranca;
    }
}

class Filho extends Pai {
    public function acessarHeranca() {
        return $this->mostrarHeranca(); // Acesso permitido em subclasses
    }
}

$obj = new Filho();
// echo $obj->heranca; // Erro: Não acessível diretamente
echo $obj->acessarHeranca(); // Correto: Acesso permitido via método público
```

---

## Resumo
> Esses modificadores são fundamentais para implementar o encapsulamento, um dos pilares da programação orientada a objetos, permitindo maior controle sobre como os dados e comportamentos de uma classe são expostos e manipulados.

|**Modificador**|**Acesso na Classe**|**Acesso na subclasse**| **Acesso fora da classe**|
|---------------|--------------------|-----------------------|------------------|
|*public*|Sim|Sim|Sim|
|*private*|Sim|Não|Não|
|*protected*|Sim|Sim|Não|

#### Exemplo
```php
<?php
class Usuario {
    // Atributos
    public string $nome;          // Qualquer código pode acessar
    private string $senha;        // Apenas dentro da classe
    protected string $email;      // Classe e subclasses

    // Construtor
    public function __construct(string $nome, string $email, string $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    // Método público → pode ser chamado de fora
    public function exibirNome(): string {
        return "Usuário: " . $this->nome;
    }

    // Método privado → usado apenas internamente
    private function criptografarSenha(): string {
        return password_hash($this->senha, PASSWORD_DEFAULT);
    }

    // Método protegido → pode ser usado por classes filhas
    protected function getEmail(): string {
        return $this->email;
    }

    // Método público que usa o privado internamente
    public function salvar(): void {
        $hash = $this->criptografarSenha();
        echo "Salvando {$this->nome} com senha criptografada: {$hash}\n";
    }
}

// Classe filha
class Admin extends Usuario {
    public function exibirEmail(): string {
        // Pode acessar o método protegido da classe pai
        return "Email do admin: " . $this->getEmail();
    }
}

// --- Testando ---
$usuario = new Usuario("João", "joao@email.com", "123456");
echo $usuario->exibirNome() . PHP_EOL;   // OK
$usuario->salvar();                      // OK

$admin = new Admin("Maria", "maria@email.com", "abcdef");
echo $admin->exibirEmail() . PHP_EOL;    // OK

// Tentativas inválidas (gerariam erro):
// echo $usuario->senha;          // ERRO → private
// echo $usuario->email;          // ERRO → protected
// echo $usuario->criptografarSenha(); // ERRO → private
```

## Exercício:
1) Com base no exemplo acima, modifique o código removendo ora um, ora outro comentário e execute o programa para identificar as diferenças.
2) Com base ainda no exemplo acima, altere os **modificadores** (public, private, protected) e rode o programa para identificar as diferenças.

---
## 🧠 Raciocínio
- Atributos **públicos** (`$nome`) são úteis quando queremos expor dados simples sem restrição.
- Atributos **privados** (`$senha`) protegem informações sensíveis, evitando acesso direto.
- Atributos **protegidos** (`$email`) permitem que subclasses manipulem dados herdados sem expor ao mundo externo.
- Métodos **privados** (`criptografarSenha`) encapsulam lógica interna que não deve ser acessada fora.
- Métodos **protegidos** (`getEmail`) permitem reutilização em herança.
- Métodos **públicos** (`exibirNome`, `salvar`) são a interface oficial da classe para o "mundo externo".
**Isso garante segurança, organização e flexibilidade no código**
