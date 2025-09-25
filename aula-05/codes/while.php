<?php
/* example 1 */
echo "Exemplo 1 \n";
$i = 0;
while ($i <= 10) {
     // o valor exibido será $i antes do incremento
    echo "Valor antes do incremento: " . $i++ . "\n";
    // o valor exibido será $i depois do incremento
    echo $i . "\n";
}

/* example 2 */
echo "Exemplo 2 \n";
$i = 1;
while ($i <= 10):
    echo $i . "\n";
    $i++;
endwhile;
?>