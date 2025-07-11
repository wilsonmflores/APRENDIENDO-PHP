<!-- utiliza una funcion de PHP para mostrar la fecha actual por pantalla despues de un salto de linea. -->
<h1>EJERCICIO 18</h1>
<?php
    // ejercicio18.php
    // Utilizar la función date() para mostrar la fecha actual.
    // La función date() toma un formato como argumento y devuelve la fecha actual en ese formato.
    // El formato 'Y-m-d H:i:s' muestra el año, mes, día, hora, minuto y segundo.
    echo "Fecha actual: " . date('Y-m-d H:i:s') . "<br>";
    // También se puede utilizar la función time() para obtener la marca de tiempo actual.
    // La función time() devuelve el número de segundos desde la época Unix (1 de enero de 1970).
    echo "Marca de tiempo actual: " . time();
    // Para mostrar la fecha en un formato más legible, se puede utilizar la función strftime().
    // La función strftime() formatea la fecha y hora según la configuración regional.
    //echo "Fecha actual (formateada): " . strftime('%A, %d de %B de %Y, %H:%M:%S');
    // Nota: strftime() puede no estar disponible en todas las configuraciones de PHP por lo que es recomendable utilizar date() para la mayoría de los casos.
?>