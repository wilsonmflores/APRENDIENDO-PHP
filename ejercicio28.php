<!-- Crea un script PHP que inserte 4 registros en la tabla que creaste en el ejercicio anterior -->

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

$sql = "INSERT INTO users VALUES(NULL, 'victor', 'Robles', 'web developer', 'victor@example.com', '".sha1('password123')."', 'admin')";
$user = mysqli_query($db, $sql);

$sql = "INSERT INTO users VALUES(NULL, 'victor', 'Robles', 'web developer', 'victor@example.com', '".sha1('password123')."', 'admin')";
$user2 = mysqli_query($db, $sql);

$sql = "INSERT INTO users VALUES(NULL, 'victor', 'Robles', 'web developer', 'victor@example.com', '".sha1('password123')."', 'admin')";
$user3 = mysqli_query($db, $sql);

$sql = "INSERT INTO users VALUES(NULL, 'victor', 'Robles', 'web developer', 'victor@example.com', '".sha1('password123')."', 'admin')";
$user4 = mysqli_query($db, $sql);

if($create_usuarios_table){
    echo "La tabla usuarios ha sido creada correctamente. !!";
}
?>