<?php

function tabla($numero, $html =null){
    $tabla = "";
    for($i = 1; $i <= 10; $i++){
        $cuenta = $i *$numero;
        $tabla .= "{$i} x {$numero} = {$cuenta} <br/>";
    }
    if ($html != null){
        echo "<h3>tabla del {$numero}</h3>";
      echo $tabla;
    }
return $tabla;
}
echo "<h1>tablas de mutiplicar </h1>";
for ($i=1; $i<=10;$i++){
    tabla($i, true);
}

?>