# 📣 Aula 05 - Estruturas de Controle

## 🎯 Objetivos
- Dominar estruturas condicionais (if/elseif/else, swith, match)
- Compreender e implementar loops (for, while, do-while, foreach)

---
## Introdução
Nesta aula, vamos aprender a controlar o fluxo de execução de um programa. Em vez do código rodar sempre em linha reta, de cima para baixo, vamos ensiná-lo a tomar decisões, desviar de caminhos e repetir tarefas. Para isso, usaremos os resultados das expressões que aprendemos na aula passada, especialmente os valores booleanos (`true` e `false`), para guiar o comportamento do nosso script.

## Estruturas condicionais

### IF IF-ELSE IF-ELSEIF-ELSE
O `if` é um dos recursos mais importantes em muitas linguagens, inclusive no PHP. Permite a execução condicional de fragmentos de código. O PHP apresenta uma estrutura `if` semelhante a do C:
```php
if (expr) { // se expr for avaliada como true será executado
  statement
}
```
Muitas vezes deseja-se executar uma instrução se uma certa condição for válida, e uma instrução diferente se a mesma condição não for válida. Para isso que o `else` serve. O `else` estende a instrução `if` para executar outras caso a expressão no `if` retornar false.
```php
if (expr) {
  statement
} else { // se expr for avaliada como false será executado
  statement
}
```
O `elseif`, como o nome sugere, é uma combinação do `if` e `else`. Como o `else`, estende um `if` para executar instruções diferentes no caso da expressão `if` original ser avaliada como `false`. Entretanto, diferentemente do `else`, executará uma expressão alternativa somente se a expressão condicional do `elseif` for avaliada como `true`.
```php
if (expr) {
  statement
} elseif (expr2) { // se expr for avaliada como false será executado
  statement
} else { // se expr e expr2 for avaliada como false será executado
  statement
}
```
**Exemplo simples**
```php
<?php
  $a = 5;
  $b = 3;
  if ($a > $b)
    echo "a é maior que b";
?>
```

```php
<?php
  $a = 5;
  $b = 8;
  if ($a > $b)
    echo "a é maior que b";
  else
    echo "a é menor que b";
?>
```

```php
<?php
  $nota_final = 6.5;
  echo "A nota final do aluno foi $nota_final.\n";
  
  if ($nota_final >= 7.0) {
      echo "Status: Aprovado!\n";
  } elseif ($nota_final >= 5.0) {
      echo "Status: Em recuperação.\n";
  } else {
      echo "Status: Reprovado.\n";
  }
?>
```
> O `if` pode ser aninhado dentro de outros `if`, quantos forem necessários.

### SWITCH
A declaração `switch` é similar a uma série de declarações `IF` na mesma expressão. Em muitos casos, se deseja comparar as mesmas variáveis (ou expressões), com diferentes valores, e executar pedaços diferentes de código dependendo de qual valor ela é igual. Esta é exatamente a serventia da declaração switch.

**Exemplo simples**
```php
<?php
  $opcao = 2;
  echo "Opção escolhida: $opcao\n";

  switch ($opcao) {
      case 1:
          echo "Você escolheu 'Ver Perfil'.\n";
          break;
      case 2:
          echo "Você escolheu 'Editar Perfil'.\n";
          break;
      default:
          echo "Opção inválida.\n";
          break;
  }
?>
```

### MATCH
A expressão `match` ramifica a avaliação baseada em uma verificação de identidade de um valor. Semelhante a uma declaração `switch`, uma expressão `match` possui uma expressão sujeito que é comparada com múltiplas alternativas. Ao contrário da `switch`, ela irá avaliar para um valor assim como as expressões ternárias. Diferente da `switch`, a comparação é uma verificação de identidade `(===)` em vez de uma comparação de igualdade fraca `(==)`. Expressões `match` estão disponíveis a partir do PHP 8.0.0.

**Exemplo simples**
```php
<?php
  $comida = 'bolo';
  
  $valor_de_retorno = match ($comida) {
      'apple' => 'Essa comida é uma maçã',
      'bar' => 'Essa comida é um bar',
      'bolo' => 'Essa comida é um bolo',
  };
  
  var_dump($valor_de_retorno); // Saída será: string(19) "Essa comida é um bolo"
?>
```

## Estruturas de repetição
Os laços for são os mais complexos no PHP. Possui comportamento semelhante ao C.

### FOR
A sintaxe do laço for é:
```php
for (expr1; expr2; expr3)
    statement
```

A primeira expressão `expr1` é avaliada (executada), uma vez, incondicionalmente, no início do laço. No começo de cada iteração a `expr2` é avaliada. Se a avaliada como `true`, o laço continuará e as instruções aninhadas serão executadas. Se avaliada como `false`, a execução do laço terminará. No final de cada iteração, a `expr3` é avaliada (executada). \
Cada uma das expressões podem ser vazias ou conter múltiplas expressões separadas por vírgulas. Na expr2, todas as expressões separadas por vírgula são avaliadas mas o resultado é obtido da última parte. Se a expr2 estiver vazia significa que o laço deve ser executado indefinidamente (O PHP considera implicitamente como true, igual ao C). Isto não é inútil como se imagina, pois muitas vezes deseja-se interromper o laço utilizando a instrução break ao invés de usar a expressão verdade do for.

**Exemplo simples**
```php
<?php
  $contador = 1;
  
  while ($contador <= 5) {
      echo "Execução número: $contador\n";
      $contador++;
  }
?>
```

**Exemplo de variações do FOR**
```php
<?php
  /* exemplo 1 */
  echo "Exemplo 1\n";
  for ($i = 1; $i <= 10; $i++) {
      echo $i;
  }
  echo "\n";
  
  /* exemplo 2 */
  // Se neste exemplo mudar a posição do ECHO ???
  echo "Exemplo 2\n";
  for ($i = 1; ; $i++) {
      if ($i > 10) {
          break;
      }
      echo $i;
  }
  echo "\n";

  /* exemplo 3 */
  echo "Exemplo 3\n";
  $i = 1;
  for (; ; ) {
      if ($i > 10) {
          break;
      }
      echo $i;
      $i++;
  }
  echo "\n";

  /* exemplo 4 */
  echo "Exemplo 4\n";
  for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);
?>
```

### WHILE
Laços `while` são os mais simples tipos de laços do PHP. Possui comportamento semelhante ao C. O formato básico de uma declaração while é:
```php
while (expr)
    statement
```
O propósito da declaração `while` é simples. Ele dirá ao PHP para executar as declarações aninhadas repetidamente, enquanto a expressão do `while` for avaliada como `true`. O valor da expressão é checado a cada vez que o laço é iniciado, então, mesmo seu valor mude durante a execução das declarações aninhadas, a execução não será interrompida até o final da iteração (cada vez que o PHP executa as declarações dentro do laço é uma iteração). Se a expressão do `while` for avaliada como `false` desde o início, as declarações aninhadas não serão executadas nenhuma vez. \
Similar a declaração `if`, pode-se agrupar múltiplas declarações no mesmo laço `while` delimitando o grupo de declarações por chaves, ou utilizando a sintaxe alternativa:
```php
while (expr):
    statement
    ...
endwhile;
```

**Exemplo simples**
Os exemplos a seguir são idênticos, e ambos imprimem os números de 1 a 10.
```php
<?php
/* example 1 */

$i = 1;
while ($i <= 10) {
    echo $i++;  /* o valor exibido seria
                   $i antes do incremento
                   (incrementa depois) */
}

/* example 2 */

$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;
?>
```

### DO-WHILE
Os laços `do-while` são muito similares aos laços `while`, com exceção que a expressão de avaliação é verificada ao final de cada iteração em vez de no começo. A maior diferença para o laço `while` é que a primeira iteração do laço `do-while` sempre é executada (a expressão de avaliação é executada somente no final da iteração), considerando que no laço `while` não é necessariamente executada (a expressão de avaliação é executada no começo de cada iteração, se avaliada como false logo no começo, a execução do laço será abortada imediatamente). \
Só há uma sintaxe para o laço do-while:
```php
<?php
$i = 0;
do {
    echo $i;
} while ($i > 0);
?>
```
O laço acima será executado somente uma vez, pois após a primeira iteração, quando a expressão de avaliação for executada, resultará em `false` (`$i` não é maior que 0) e a execução do laço será encerrada.


### FOREACH
O construtor `foreach` fornece uma maneira fácil de iterar sobre *arrays* e objetos. O `foreach` emitirá um erro quando usado com uma variável contendo um tipo de dado diferente ou com uma variável não inicializada. \
`foreach` pode, opcionalmente, obter a chave (key) de cada elemento:
```php
foreach (expressão_iterável as $valor) {
    lista_de_instruções
}

foreach (expressão_iterável as $chave => $valor) {
    lista_de_instruções
}
```

**Exemplo simples**
```php
<?php
  // Loop FOREACH para arrays
  $frutas = ["maçã", "banana", "laranja"];
  
  echo "\nLista de frutas:\n";
  foreach ($frutas as $fruta) {
      echo "- $fruta\n";
  }
  
  // FOREACH com chave e valor
  $pessoa = [
      "nome" => "João",
      "idade" => 25,
      "cidade" => "São Paulo"
  ];
  
  foreach ($pessoa as $chave => $valor) {
      echo "$chave: $valor\n";
  }
?>
```

### Quando usar
Usamos o **`for`** quando sabemos exatamente quantas vezes o loop deve executar. Já o **`foreach`**, para percorrer arrays e objetos de forma simples e segura.

---
## 📚 Exercícios
1. Verificador de elegibilidade para voto \
&nbsp;&nbsp;&nbsp;Crie um programa avalia a idade e com base no valor, retorna "Não pode votar" (menor que 16), "Voto facultativo" (16,17 ou > 70) ou "Voto obrigatório" (18 à 70).
2. Calculador de IMC \
&nbsp;&nbsp;&nbsp;Crie um programa que calcula o IMC e classifique em "Abaixo do peso" se IMC < 18.5, "Peso normal" se >= 18,5 e < 24,9, "Sobrepeso" se >= 25 e < 29,9 ou "Obesidade". Cálculo IMC: \
`IMC = PESO / (ALTURA * ALTURA)`
3. Tabuada \
&nbsp;&nbsp;&nbsp;Crie um programa que execute um loop para gerar a tabuada de um número escolhido pelo programador.
4. Análise de array \
&nbsp;&nbsp;&nbsp;Dado o array abaixo, calcule a média, a maior e menor nota usando foreach. \
$notas = [8.5, 7.5, 9, 5, 7, 4.5]