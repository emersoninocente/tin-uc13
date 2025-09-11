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
  
  echo "Soma: " . ($numero1 + $numero2) . "\n";            // Saída: Soma: 19
  echo "Subtração: " . ($numero1 - $numero2) . "\n";       // Saída: Subtração: 11
  echo "Multiplicação: " . ($numero1 * $numero2) . "\n";   // Saída: Multiplicação: 60
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
| `&&` ou `and` | E (and)        | `$a && $b`   | `true` se ambos `$a` e `$b` forem verdadeiros |
| `\|\|` ou `or`| OU (or)        | `$a \|\| $b` | `true` se pelos menos uma das condições for verdadeira |
! `!` | NÃO (not) | `!$a` | Inverte o valor booleano de `$a` |
| `xor` | OU exclusivo | `$a xor $b` | `true` se apenas uma das condições for verdadeira |

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

Crie um arquivo `logicos.php` e digite:
```php
<?php

$idade = 20;
$possui_autorizacao = false;

  // Para entrar na festa, precisa ter 18 anos OU possuir autorização
  $pode_entrar = ($idade >= 18) || ($possui_autorizacao == true);
  
  echo "Pode entrar na festa? ";
  var_dump($pode_entrar); // Saída: bool(true)
  
  // Para o cargo, precisa ser maior de idade E ter CNH
  $tem_cnh = true;
  $pode_se_candidatar = ($idade >= 18) && ($tem_cnh == true);
  
  echo "Pode se candidatar ao cargo? ";
  var_dump($pode_se_candidatar); // Saída: bool(true)
  
?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe logicos.php`

Crie um arquivo `logicos2.php` e digite:
```php
<?php
    // AND
    $a = true;
    $b = false;
    var_dump($a && $b); // false
    var_dump($a and $b); // false

    $c = true;
    $d = true;
    var_dump($c && $d); // true
    var_dump($c and $d); // true

    // OR
    var_dump($a || $b); // true
    var_dump($a or $b); // true
    
    var_dump($c || $d); // true
    var_dump($c or $d); // true

    // XOR
    var_dump($a xor $b); // true
    var_dump($a xor $c); // false
?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe logicos2.php`

___
### Incremento/decremento
São operadores usados para adicionar ou subtrair `1` de uma variável.

| Operador      |   Nome         | Descrição         |
| :--           | :--            | :--               |
| `++$a`        | Pré-incremento | Incrementa `$a` em 1 e depois retorna `$a` |
| `$a++`        | Pós-incremento | Retorna `$a` e depois incrementa `$a` em 1 |
| `--$a`        | Pré-decremento | Decrementa `$a` em 1 e depois retorna `$a` |
| `$a--`        | Pós-decremento | Retorna `$a` e depois decrementa `$a` em 1 |

**Exemplo prático:**
Crie um arquivo `incremento.php` e digite:
```php
<?php

  $contador = 5;
  echo "Pós-incremento: " . $contador++ . "\n"; // Mostra 5, depois contador vira 6
  echo "Valor atual: " . $contador . "\n"; // Mostra 6
  
  $contador2 = 5;
  echo "Pré-incremento: " . ++$contador2 . "\n"; // contador2 vira 6, depois mostra 6
  echo "Valor atual: " . $contador2 . "\n"; // Mostra 6

?>
```
> **Para aluno:** Salve e execute no terminal `C:\xamp\php\php.exe incremento.php`

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

---

## 🛠️ Exercícios
> Crie um arquivo PHP para cada exercício e execute-o via terminal para ver a saída.

### Exercício 1: Calculadora de Média Ponderada
As notas de uma disciplina têm pesos diferentes. A nota da prova 1 tem peso 2, a da prova 2 tem peso 3 e a do trabalho tem peso 5.
1. Crie variáveis para as 3 notas e seus respectivos pesos.
2. Calcule a média ponderada: `(nota1*peso1 + nota2*peso2 + nota3*peso3) / (soma dos pesos)`.
3. Use parênteses para garantir a ordem correta das operações.
4. Exiba a média final.

### Exercício 2: Verificador de Acesso a Evento
Para entrar em um evento, a pessoa precisa ser maior de 18 anos E ter um ingresso válido.
1. Crie uma variável $idade e uma variável booleana $tem_ingresso.
2. Crie uma expressão que verifique se ambas as condições são verdadeiras.
3. Use var_dump() para exibir o resultado. Teste diferentes valores para as variáveis.

### Exercício 3: Par ou Ímpar com Verificação de Tipo
1. Crie uma variável $numero e atribua um valor a ela (pode ser um número ou uma string).
2. Crie uma expressão que verifique DUAS coisas: se a variável é do tipo integer E se o resto da sua divisão por 2 é 0.
3. Use var_dump() para exibir o resultado da expressão. Teste com 10, 7 e "10". O que acontece em cada caso?

### Exercício 4 (Desafio): Lógica de Desconto
Uma loja oferece desconto sob as seguintes condições:
- A compra deve ser maior que R$ 100,00 OU o cliente deve ter o cartão da loja.
- E, além disso, o produto não pode estar na categoria "promoção".
1. Crie as variáveis: $valor_compra, $cliente_tem_cartao (booleano) e $produto_em_promocao (booleano).
2. Monte uma única expressão que valide a regra de desconto. Lembre-se de usar parênteses para agrupar a lógica do OU.
3. Use var_dump() para exibir se o desconto deve ser aplicado ou não. Teste diferentes combinações.