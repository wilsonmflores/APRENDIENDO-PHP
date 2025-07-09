<!-- escribe un programa que multiplique los 20 primeos 
numeros naturales utilizando el bucle while -->

<?php
$numero =1;
$contador =2;
while($contador <= 20){

    $numero *= $contador;
    echo $numero. "<br/>";
    $contador++;
}
echo"El resultado de multiplicar los 20 primeros numeros es: ".$numero;
?>