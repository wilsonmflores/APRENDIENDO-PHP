<!-- Escribe un programa que compruebe si una variable esta vacía y si esta vacía, 
rellenarla con texto en minúsculas y mostrarlo convertido  a mayúscula en negrita.   -->

<?php
$miVariable = "";


if (empty($miVariable)) {
    $miVariable = "este es un texto de ejemplo";
}

$textoMayusculas = strtoupper($miVariable);

echo "<strong>$textoMayusculas</strong>";
?>
