<!-- Escribe un programa que muestre la dirección IP del usuario que visita nuestra 
web y si usa Firefox darle la enhorabuena. -->

<?php
// Obtener la dirección IP del usuario
$ip = $_SERVER['REMOTE_ADDR'];

// Obtener el agente de usuario
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Mostrar la dirección IP
echo "Tu dirección IP es: $ip<br>";

// Comprobar si el usuario usa Firefox
if (strpos($user_agent, 'Firefox') !== false) {
    echo "¡Enhorabuena! Estás usando Firefox.";
}
?>
