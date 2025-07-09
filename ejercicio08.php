<!-- escribe un programa que calcule el factorial de cualquier 
numero almacenado en una variable -->

<?php
$factorial =1;
$numero = $_GET["numero"];

for($cont = 1; $cont <=$numero; $cont++){
    //$factorial = $factorial * $cont
    $factorial *= $cont;
}
echo "El factorial de ".$numero." es ".$factorial;
?>