# 🖱️ Aula 04 - Exercícios de revisão, Operadores e Expressões

## Objetivos
- Executar exercícios sobre os assuntos das aulas 02 e 03
- Entendimento dos operadores em PHP
  - Atribuição
  - Aritmético
  - Comparação
  - Lógico
  - incremento/decremento
- Precedência
- Expressões

---
## 🧠 - Exercícios:
> No editor VS Code, crie uma pasta chamada `exercicios` e dentro desta crie um arquivo para cada código abaixo, avalie qual será a saída:


1) 
```php
<?php
  $idade = 25;
  echo gettype($idade);
?>
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. Integer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. Boolean&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. String&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. Double&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. Null

2) 
```php
<?php
  $salario = 1250.75;
  echo gettype($salario);
?>
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. Integer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. Boolean&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. String&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. Double&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. Null

3) 
```php
<?php
  $nome_curso = "Desenvolvimento Web com PHP";
  echo gettype($nome_curso);
?>
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. Integer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. Boolean&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. String&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. Double&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. Null

4) 
```php
<?php
  $aluno_aprovado = true;
  echo gettype($aluno_aprovado);
?>
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. Integer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. Boolean&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. String&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. Double&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. Null

5) 
```php
<?php
  $telefone;
  echo gettype($telefone);
?>
```
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. Integer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. Boolean&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. String&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. Double&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E. Null

6) Considere o script:
```php
<?php
  $quantidade = 0;
  ...
?>
```
Qual função substitui os `...` retornando `true` para a variável `$quantidade`?

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A. is_int($quantidade)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B. is_null($quantidade)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C. is_string($quantidade)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D. is_bool($quantidade)


---
## 📌 Expressão
### O que é uma expressão?
Uma expressão é qualquer combinação de valores, variáveis e operadores que o PHP pode calcular (ou "avaliar") para produzir um resultado.\
**Exemplo simples**
```php
$soma = 5 + 3; // "5 + 3" é uma expressão. O resultado (8) é guardado na variável $soma.
```
A linha inteira `$soma = 5 + 3;` é uma **instrução** ou **declaração**.

---
## 📱 Operadores
### Atribuição
O operador mais comum é o de atribuição simples `=`. Ele atribui o resultado da expressão à direita para a variável à esquerda.
**Exemplo simples**
```php
$a = 5; // A variável $a armazenará o valor 5
```
Existem também operadores de atribuição combinada, que são um atalho para operações comuns.

| Operador | Exemplo  | Equivalente a |
| :--:     | :--:     | :--:          |
| +=       | $a += $b | $a = $a + $b  |
| -=       | $a -= $b | $a = $a - $b  |
| *=       | $a *= $b | $a = $a * $b  |
| /=       | $a /= $b | $a = $a / $b  |

**Exemplo prático:**
Crie um arquivo `atribuicao.php` e digite:
```php
<?php

  $saldo = 100;
  echo "Saldo inicial: R$ " . $saldo . "\n";
  
  $saldo += 50.50; // Recebeu um PIX
  echo "Saldo após depósito: R$ " . $saldo . "\n"; // Saída: 150.5
  
  $saldo -= 25; // Pagou um lanche
  echo "Saldo após compra: R$ " . $saldo . "\n"; // Saída: 125.5

?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe atribuicao.php`

___
### Aritmético
São os operadores que usamos para realizar cálculos matemáticos.

| Operador  |   Nome         | Exemplo  | Equivalente a     |
| :--       | :--            | :--      | :--               |
| +         | Adição         | $a + $b  | Soma de `$a` e `b`|
| -         | Subtração      | $a - $b  | Diferença de `$a` e `b`|
| *         | Multiplicação  | $a * $b  | Produto de `$a` e `b`|
| /         | Divisão        | $a / $b  | Quociente de `$a` e `b`|
| %         | Módulo         | $a % $b  | Resto da divisão de `$a` e `b`|

**Exemplo prático:**
Crie um arquivo `aritmetico.php` e digite:
```php
<?php

  $numero1 = 15;
  $numero2 = 4;
  
  echo "Soma: " . ($numero1 + $numero2) . "\n";           // Saída: Soma: 19
  echo "Subtração: " . ($numero1 - $numero2) . "\n";     // Saída: Subtração: 11
  echo "Multiplicação: " . ($numero1 * $numero2) . "\n"; // Saída: Multiplicação: 60
  echo "Divisão: " . ($numero1 / $numero2) . "\n";         // Saída: Divisão: 3.75
  echo "Módulo (resto): " . ($numero1 % $numero2) . "\n";  // Saída: Módulo (resto): 3

?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe aritmetico.php`

___
### Comparação e Lógicos
O resultado de uma expressão de comparação é sempre um **booleano** (`true` ou `false`).

| Operador      |   Nome         | Exemplo      | Descrição         |
| :--           | :--            | :--          | :--               |
| `==`          | Igual          | `$a == $b`   |`true` se `$a` tem o mesmo valor de `$b` após a conversão de tipo |
| `===`         | Identico       | `$a === $b`  |`true` se `$a` tem o mesmo valor e mesmo tipo de `$b` |
| `!=` ou `<>`  | Diferente      | `$a != $b`   |`true` se `$a` não é igual à `$b` |
| `>` ou `<`    | Maior / Menor que | `$a > $b` |Compara se um valor é maior ou menor que outro |
| `>=` ou `<=`  | Maior ou igual / Menor ou igual | `$a >= $b` | Compara se maior/menor ou igual |

**Exemplo prático:**
Crie um arquivo `comparacao.php` e digite:
```php
<?php

  $numero_a = 10;
  $numero_b = "10";
  
  echo "Comparando 10 e '10':\n";
  echo "Com == (Igual): ";
  var_dump($numero_a == $numero_b); // Saída: bool(true) -> O PHP converte a string "10" para número antes de comparar.
  
  echo "Com === (Idêntico): ";
  var_dump($numero_a === $numero_b); // Saída: bool(false) -> O valor é o mesmo, mas os tipos (integer e string) são diferentes.

?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe comparacao.php`
___
### Precedência
O que você acha que o código abaixo vai imprimir? \
`echo 5 + 3 * 2;`

> O PHP obedece a **ordem de precedência** da matemática ao executar os operadores.

**Regra geral de precedência (do maior para o menor):**
 1. Parênteses **( )** -> Qualquer expressão dentro de parênteses é resolvida primeiro
 2. Incremento/decremento **++**, **--**
 3. Multiplicação **\***, divisão **\\**, módulo **%**
 4. Adição **+**, subtração **-**
 5. Comparação **<**, **>**, **<=**, **>=**
 6. Igualdade **==**, **!=**, **===**, **!==**
 7. Lógico **E &&**
 8. Lógico **OU ||**
 9. Atribuição **=**, **+=**, **-=**

**Exemplo prático:**
Crie um arquivo `precedencia.php` e digite:
```php
<?php

  // Sem parênteses: multiplicação ocorre primeiro
  $resultado1 = 5 + 3 * 2; // 5 + 6
  echo "Resultado 1: " . $resultado1 . "\n"; // Saída: 11
  
  // Com parênteses: forçamos a soma a ocorrer primeiro
  $resultado2 = (5 + 3) * 2; // 8 * 2
  echo "Resultado 2: " . $resultado2 . "\n"; // Saída: 16
  
  // Exemplo mais complexo
  $valor = 10;
  $teste = $valor > 5 && $valor < 20; // Comparação (>) e (<) antes do E (&&)
  echo "O valor está entre 5 e 20? ";
  var_dump($teste); // Saída: bool(true)

?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe precedencia.php`

**Dica de ouro** na dúvida use parênteses. Torna o código mais limpo de ler e garante que as operações serão executadas na ordem necessária.