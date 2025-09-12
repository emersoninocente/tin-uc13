# 📦 Aula 06 - Funções

## 🎯 Objetivos

---
## 🧑‍🎨 Introdução

## 📺 Funções personalizadas
> Funções são blocos de código nomeados que realizam uma tarefa específica. Elas são essenciais para escrever código limpo, organizado e reutilizável.

### 💡 Declaração e parâmetros
> Declaramos uma função com a palavra-chave `function` e podemos passar dados para ela através de parâmetros (os "ingredientes" da função).

**Exemplo simples**
```php
<?php
  function exibirBoasVindas($nome_usuario) {
      echo "Olá, $nome_usuario! Seja bem-vindo(a).\n";
  }
  
  exibirBoasVindas("Maria");
  exibirBoasVindas("João");
  
  function somar($num1, $num2) {
      $soma = $num1 + $num2;
      echo "A soma de $num1 e $num2 é: $soma\n";
  }
  
  somar(10, 5);
?>
```

## Retorno e escopo de variáveis

### ↩️ Return
> Funções podem devolver um valor usando a palavra-chave `return`. Isso permite que o resultado da função seja armazenado em variáveis ou usado em outras expressões.

**Exemplo simples**
```php
  <?php
  function calcularMedia($n1, $n2, $n3) {
      $media = ($n1 + $n2 + $n3) / 3;
      return $media;
  }
  
  $media_aluno1 = calcularMedia(8, 7, 9);
  echo "A média do aluno 1 é: " . number_format($media_aluno1, 2) . "\n";
  
  if (calcularMedia(4, 5, 4.5) >= 7) {
      echo "O aluno 2 foi aprovado.\n";
  } else {
      echo "O aluno 2 NÃO foi aprovado.\n";
  }
?>
```

### ↔️ Escopo
> Variáveis declaradas dentro de uma função (`escopo local`) não são acessíveis fora dela, e vice-versa. Isso evita conflitos e alterações acidentais de dados.

**Exemplo simples**
```php
<?php
  $nomeGlobal = "Global";
  
  function minhaFuncao() {
      $nomeLocal = "Local";
      echo $nomeLocal; // Funciona
      // echo $nome_global; // ERRO
  }
  
  minhaFuncao();
  // echo $nome_local; // ERRO
?>
```

---
## 📐 Funções internas do PHP
> O PHP possui muitas funções internas que podem ser usadas para nos auxiliar nos processos de desenvolvimento. Vamos ver algumas abaixo:

### 🎙️ Manipulação de string
Podemos usar `strlen`, `trim`, `str_replace`, `explode`, `substr` entre outras.

```php
<?php
   // Funções de manipulação de strings
   $texto = "  Olá, Mundo PHP!  ";
   
   echo strlen($texto); // 19 - comprimento da string
   echo trim($texto); // "Olá, Mundo PHP!" - remove espaços
   echo strtoupper($texto); // "  OLÁ, MUNDO PHP!  "
   echo strtolower($texto); // "  olá, mundo php!  "
   echo ucfirst(trim($texto)); // "Olá, mundo php!"
   echo ucwords(trim($texto)); // "Olá, Mundo Php!"
   
   // Busca e substituição
   $frase = "PHP é uma linguagem de programação";
   echo str_replace("PHP", "PHP 8", $frase);
   echo strpos($frase, "linguagem"); // 11 - posição da palavra
   
   // Divisão e junção
   $palavras = explode(" ", $frase);
   print_r($palavras); // Array com as palavras
   echo implode("-", $palavras); // Junta com hífen
   
   // Substring
   echo substr($frase, 0, 3); // "PHP"
   echo substr($frase, -11); // "programação"
```

### ↖️ Manipulação de arrays
Nas interações com arrays temos funções específicas que nos auxiliam, na modificação por exemplo `push`, `pop`, `shift`, `unshift` para adicionar/remover elementos ou para o processamento temos as `map`, `filter`, `reduce` para transformar dados.
```php
<?php
  // Funções de manipulação de arrays
  $numeros = [1, 2, 3, 4, 5];
  $frutas = ["maçã", "banana", "laranja"];
  
  // Informações sobre o array
  echo count($numeros); // 5 - quantidade de elementos
  echo array_sum($numeros); // 15 - soma dos elementos
  echo max($numeros); // 5 - maior valor
  echo min($numeros); // 1 - menor valor
  
  // Adição e remoção
  array_push($frutas, "uva", "pera");
  $ultimaFruta = array_pop($frutas); // Remove e retorna último
  array_unshift($frutas, "abacaxi"); // Adiciona no início
  $primeiraFruta = array_shift($frutas); // Remove e retorna primeiro
  
  // Busca e verificação
  if (in_array("banana", $frutas)) {
      echo "Banana está na lista!";
  }
  
  $posicao = array_search("laranja", $frutas);
  echo "Laranja está na posição: $posicao";
  
  // Ordenação
  sort($numeros); // Ordena valores
  rsort($numeros); // Ordena decrescente
  asort($frutas); // Ordena mantendo chaves
  ksort($frutas); // Ordena por chaves
  
  // Filtragem e mapeamento
  $pares = array_filter($numeros, fn($n) => $n % 2 == 0);
  $dobrados = array_map(fn($n) => $n * 2, $numeros);
```

### ⚙️ Funções para data e hora
Para manipulações de timestamp e formatação de data e hora, temos as seguintes funções como exemplos: `date`, `time`, `DateTime`, `DateInterval`.
> Ao manipular datas, procure usar a classe `DateTime` por ser mais robusta e orientada à objetos.

```php
<?php
  // Funções de data e hora
  echo date('Y-m-d H:i:s'); // 2024-03-15 14:30:22
  echo date('d/m/Y'); // 15/03/2024
  echo date('l, F j, Y'); // Friday, March 15, 2024
  
  // Timestamp
  $timestamp = time(); // Timestamp atual
  $dataEspecifica = mktime(0, 0, 0, 12, 25, 2024); // 25/12/2024
  
  // Formatação personalizada
  $agora = new DateTime();
  echo $agora->format('Y-m-d H:i:s');
  
  // Adição/subtração de tempo
  $proximaSemana = new DateTime();
  $proximaSemana->add(new DateInterval('P7D')); // +7 dias
  echo $proximaSemana->format('d/m/Y');
  
  // Diferença entre datas
  $nascimento = new DateTime('1990-05-15');
  $hoje = new DateTime();
  $idade = $hoje->diff($nascimento);
  echo $idade->y . " anos";
  
  // Validação de data
  if (checkdate(2, 29, 2024)) {
      echo "Data válida!";
  }
```

### 🛠️ Funções utilitárias
Temos funções que nos auxiliam nos processos de validação, conversão e matemática.
> **Importante:** Sempre valide os dados de entrada usando `filter_var()` para prevenir problemas de segurança.

```php
<?php
  // Funções de validação e conversão
  $email = "usuario@exemplo.com";
  $url = "https://www.exemplo.com";
  $ip = "192.168.1.1";
  
  // Validações
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email válido!";
  }
  
  if (filter_var($url, FILTER_VALIDATE_URL)) {
      echo "URL válida!";
  }
  
  if (filter_var($ip, FILTER_VALIDATE_IP)) {
      echo "IP válido!";
  }
  
  // Conversões de tipo
  $numero = "123.45";
  echo (int)$numero; // 123
  echo (float)$numero; // 123.45
  echo intval($numero); // 123
  echo floatval($numero); // 123.45
  
  // Verificações de tipo
  echo is_string($numero) ? "É string" : "Não é string";
  echo is_numeric($numero) ? "É numérico" : "Não é numérico";
  echo is_array($frutas) ? "É array" : "Não é array";
  
  // Funções matemáticas
  echo round(123.456, 2); // 123.46
  echo ceil(123.1); // 124
  echo floor(123.9); // 123
  echo abs(-10); // 10
  echo pow(2, 3); // 8
  echo sqrt(16); // 4
  echo rand(1, 100); // Número aleatório entre 1 e 100
```

---
## 📚 Exercícios
1. Crie funções para as 4 operações matemáticas básicas (`adicao`, `subtracao`, etc.). A função de divisão deve retornar uma mensagem de erro se o divisor for zero.
2. Crie funções para `verSaldo`, `depositar` e `sacar`, manipulando uma variável de saldo. A função `sacar` deve verificar se há fundos suficientes.
3. Crie uma função para formatar nomes, que recebe um nome completo em letras minúsculas e retorna o nome com a primeira letra de cada palavra em maiúscula. (funções úteis: `ucworks()` e `strtolower()`).
4. Verificador de Palíndromo: crie uma função que recebe uma string e valida se ela tem a mesma leitura da frente para trás ou de trás para frente. A verificação deve ignorar espaços e diferenças entre maiúsculas e minúsculas, a função deve retornar `true` ou `false`. Funções úteis: `str_replace()`, `strtolower()`, `strrev()`.
5. Calculadora de Idade: Crie uma função calcularIdade que recebe uma data de nascimento no formato "AAAA-MM-DD" e retorna a idade atual da pessoa. Funções/Classes úteis: `date_create()`, `date_diff()`, `date()`.
6. Data por Extenso em Português: Crie uma função que recebe uma data no formato "AAAA-MM-DD" e a retorna em português, como "12 de Setembro de 2025". Funções úteis: `setlocale()`, `strtotime()`, `strftime()` (ou `IntlDateFormatter` para abordagens mais modernas).
7. Filtrar Alunos Aprovados: Crie uma função que recebe um array de alunos (onde cada aluno é um array associativo com 'nome' e 'nota') e retorna um novo array contendo apenas os alunos com nota maior ou igual a 7.
8. Ordenar Produtos por Preço: Crie uma função que recebe um array de produtos (arrays associativos com 'nome' e 'preco') e os ordena do mais barato para o mais caro. Funções úteis: `usort()`.
9. Apresentar Informações de um Objeto: Com base no objeto simples da classe `stdClass` para representar um Livro, com as propriedades titulo, autor e ano. Depois, crie uma função `apresentarLivro` que recebe este objeto e exibe suas informações em uma string formatada. Conceitos: `stdClass`, acesso a propriedades de objeto `(->)`.
```php
// Criando um objeto genérico
$livro = new stdClass();
$livro->titulo = "O Senhor dos Anéis";
$livro->autor = "J.R.R. Tolkien";
$livro->ano = 1954;
```

---