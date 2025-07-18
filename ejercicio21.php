<?php

function tabla($numero){
    $tabla = "";
    for($i = 1; $i <= 10; $i++){
        $cuenta = $i *$numero;
        $tabla .= "{$i} x {$numero} = {$cuenta} <br/>";
    }
return $tabla;
}
echo "<h1>tablas de mutiplicar </h1>";
for ($i=1; $i<=10;$i++){
    echo "<h3>tabla del {$i}</h3>";
    echo tabla($i);
}

?>