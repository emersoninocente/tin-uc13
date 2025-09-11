<?php
    function myConst(){
        static $TESTE = 0;
        $TESTE = $TESTE + 1;
        echo $TESTE . "\n";
    }

    myConst();
    myConst(); // Nesta execucao a CONSTANTE $TESTE já existe e com valor 1
?>