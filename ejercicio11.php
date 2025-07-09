<!-- Hacer un program que tenga un array de5 numeros enteros y hacer lo siguiente co el: 
1. Recorrelo y mostrarlo. 
2. Ordenarlo y mostrarlo. 
3. Mostrara su longitud.
4. Buscar en el vector.  -->

<?php
$numeros = array(23, 12, 45, 7, 32);

echo "1. Array original:\n";
foreach ($numeros as $numero) {
    echo $numero . " ";
}
echo "\n\n";

sort($numeros);
echo "2. Array ordenado:\n";
foreach ($numeros as $numero) {
    echo $numero . " ";
}
echo "\n\n";

echo "3. Longitud del array: " . count($numeros) . "\n\n";

$busqueda = 45;
echo "4. Buscar el número $busqueda en el array:\n";
$posicion = array_search($busqueda, $numeros);
if ($posicion !== false) {
    echo "   El número $busqueda se encuentra en la posición $posicion.\n";
} else {
    echo "   El número $busqueda no está en el array.\n";
}
?>
