<!-- Conectate a una base de datos MySQL y crea la siguiente tabla usuarios con los mismos campos que el formulario anterior -->

<?php
require_once 'includes/connect.php';

$sql = "CREATE TABLE IF NOT EXISTS USERS(
    user_id int(255) auto_increment not null,
    name varchar(50),
    surname varchar(50),
    bio text,
    email varchar(100),
    password varchar(255),
    rol varchar(50),
    CONSTRAINT pk_users PRIMARY KEY(user_id)
)";
$create_usuarios_table = mysqli_query($db, $sql);

if("create_usuarios_table"){
    echo "La tabla usuarios ha sido creada correctamente. !!";
}
?>