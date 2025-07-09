<!-- Escribe un script PHP que tenga 3 variables, una tipo array, otra tipo string 
y otra boleana y que imprima un mensaje según el tipo de variable que sea. -->

<?php

$miArray = [1, 2, 3];
$miString = "Hola, soy un string";
$miBoolean = true;

function imprimirMensajeSegunTipo($variable) {
    if (is_array($variable)) {
        echo "Esta variable es un array y contiene " . count($variable) . " elementos.<br>";
    } elseif (is_string($variable)) {
        echo "Esta variable es un string y su contenido es: '$variable'.<br>";
    } elseif (is_bool($variable)) {
        $valor = $variable ? "true" : "false";
        echo "Esta variable es un booleano y su valor es: $valor.<br>";
    } else {
        echo "Esta variable es de otro tipo.<br>";
    }
}

imprimirMensajeSegunTipo($miArray);
imprimirMensajeSegunTipo($miString);
imprimirMensajeSegunTipo($miBoolean);
?>
