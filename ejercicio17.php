<!-- Crea una funcion que realice el calculo del factorial de un numero que le pasemos por parametro y a la vez el valor de ese parametro debe capturar a traves de un metodo get, ahorrando asi lineas de codigo. -->
<h1>EJERCICIO 17</h1>
<?php
    // ejercicio17.php
    // Crear una función que calcule el factorial de un número.
    function calcularFactorial($numero) {
        // Si el número es menor que 0, retornar 0.
        if ($numero < 0) {
            return 0;
        }
        // Si el número es 0 o 1, retornar 1.
        if ($numero == 0 || $numero == 1) {
            return 1;
        }
        // Calcular el factorial utilizando recursión.
        return $numero * calcularFactorial($numero - 1);
    }
    // Comprobar si se ha pasado un parámetro 'numero' a través del método GET.
    if (isset($_GET['numero'])) {
        // Obtener el valor del parámetro 'numero' y convertirlo a entero.
        $numero = intval($_GET['numero']);
        // Calcular el factorial del número.
        $factorial = calcularFactorial($numero);
        // Mostrar el resultado.
        echo "El factorial de $numero es: $factorial";
    } else {
        // Si no se ha pasado el parámetro, mostrar un mensaje de error.
        echo "Por favor, proporciona un número a través del método GET.";
    }
    
?>