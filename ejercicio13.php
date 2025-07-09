

<?php
$miArray = array();

$valor = 1;
while (count($miArray) < 100) {
    $miArray[] = $valor;
    $valor++;
}

echo "<pre>";
print_r($miArray);
echo "</pre>";
?>
