*/ Programar la posibilidad de eliminar de la tabla utilizada/*

<?php
// Conexión a la base de datos
$db = new mysqli("localhost", "root", "", "prueva");
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}
$db->set_charset("utf8mb4");

// Si se recibió una petición de eliminación
if (isset($_GET['eliminar'])) {
    $id = intval($_GET['eliminar']);
    $sqlEliminar = "DELETE FROM usuarios WHERE id = $id";
    mysqli_query($db, $sqlEliminar);
    header("Location: ejercicio35.php");
    exit;
}

// Obtener listado de usuarios
$resultado = mysqli_query($db, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuarios</title>
    <style>
        body { font-family: Arial; background: #f0f0f0; padding: 20px; }
        table { width: 100%; border-collapse: collapse; background: white; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #007BFF; color: white; }
        a.btn-eliminar {
            background-color: red;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }
        a.btn-eliminar:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acción</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['apellido']) ?></td>
                <td><?= htmlspecialchars($fila['email']) ?></td>
                <td><?= htmlspecialchars($fila['rol']) ?></td>
                <td>
                    <a class="btn-eliminar" href="ejercicio35.php?eliminar=<?= $fila['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
