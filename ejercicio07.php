<!-- igual que el anterior pero usando el bucle foreach -->

<?php
$meses = array(
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
);
foreach ($meses as $mes){
    echo $mes."<br/>";
}
?>