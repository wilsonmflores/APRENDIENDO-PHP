<!-- Haz un listado de los registros de la tabla de la base de datos mostrando solo el nombre y los apellidos del usuario -->

<?php
include 'includes/header.php';

$users = mysqli_query($db, "SELECT * FROM users");
?>
<table class="table">
    <tr>
        <th>nombre</th>
        <th>apellidos</th>
        <th>email</th>
        <th>ver/Editar</th>
    </tr>
    <?php 
    while ($row = mysqli_fetch_assoc($users)) { ?>
    <tr>
        <td><?=$row["name"]?></td>
        <td><?=$row["surname"]?></td>
        <td><?=$row["email"]?></td>
        <td>
            <a href="ver.php?id=<?=$row["id"]?>">Ver</a>
            <a href="editar.php?id=<?=$row["id"]?>">Editar</a>
        </td>
    </tr>
    <?php }?>
</table>

<?php
include 'includes/footer.php';
?>