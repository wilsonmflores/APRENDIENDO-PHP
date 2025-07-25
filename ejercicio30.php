<!-- Crea una pagina dinamica para mostrar el detalle completo del registro pasandole por GET el ID -->

<?php require_once 'includes/header.php'; ?>
<?php
if(!isset($_GET["id"])|| empty($_GET["id"])|| !is_numeric($_GET["id"])){
    header("Location: index.php");
}
$id = $_GET["id"];
$users_query = mysqli_query($db, "SELECT * FROM users WHERE user_id = {$id}");
$user = mysqli_fetch_assoc($users_query);

if(!isset($_GET["user_id"])|| empty($user["user_id"])){
    header("Location: index.php");
}
?>

<h3><?php echo $user['name']." ".$user['surname']; ?></h3>
<p>Email: <?php echo $user['email']; ?></p>
<p>Biografia: <?php echo $user['bio']; ?></p>

<a href="index.php" class="btn-success">Volver al listado</a>

<?php require_once 'includes/footer.php'; ?>