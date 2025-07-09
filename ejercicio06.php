<!-- crear un array llamado meses y que almacene el 
nombre de los 12 meses del año recorrelo con for 
para mostrar por pantalla los 12 meses -->

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
for ($i =0; $i<count ($meses); $i++){
    echo $meses[$i]."<br/>";
}
?>