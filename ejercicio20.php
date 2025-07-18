<!-- Utiliza la Funcion filter_var para comprobar  si el email que nos llega 
por la URL es un email Valido-->
<h1>EJERCICIO 20</h1>
<?php

function  validateEmail($email){
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "VALIDO";
    }else{
        $status = "NO VALIDO";
    }
    return $status;
}

$email = "";
if(isset($_GET ["email"])){
    $email = $_GET["email"];

}
echo validateEmail($email);
?>