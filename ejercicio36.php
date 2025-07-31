*/Crea una paginacion para el listado principal/*
<?php
// Conexión a la base de datos
$db = new mysqli("localhost", "root", "", "prueva");
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}
$db->set_charset("utf8mb4");

// Configuración de paginación
$porPagina = 5;
$pagina = isset($_GET['pagina']) ? max(1, intval($_GET['pagina'])) : 1;
$inicio = ($pagina - 1) * $porPagina;

// Total de registros
$totalQuery = mysqli_query($db, "SELECT COUNT(*) AS total FROM usuarios");
$totalFilas = mysqli_fetch_assoc($totalQuery)['total'];
$totalPaginas = ceil($totalFilas / $porPagina);

// Obtener usuarios con LIMIT
$sql = "SELECT * FROM usuarios ORDER BY id DESC LIMIT $inicio, $porPagina";
$resultado = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado Paginado de Usuarios</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background-color: #007BFF; color: white; }
        .paginacion { margin-top: 20px; text-align: center; }
        .paginacion a {
            padding: 6px 10px;
            margin: 2px;
            background-color: #eee;
            color: #333;
            text-decoration: none;
            border-radius: 4px;
        }
        .paginacion a.activa {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Listado de Usuarios</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['nombre']) ?></td>
                <td><?= htmlspecialchars($fila['apellido']) ?></td>
                <td><?= htmlspecialchars($fila['email']) ?></td>
                <td><?= htmlspecialchars($fila['rol']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Paginación -->
    <div class="paginacion">
        <?php if ($pagina > 1): ?>
            <a href="?pagina=<?= $pagina - 1 ?>">&laquo; Anterior</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <a href="?pagina=<?= $i ?>" class="<?= ($i === $pagina) ? 'activa' : '' ?>"><?= $i ?></a>
        <?php endfor; ?>

        <?php if ($pagina < $totalPaginas): ?>
            <a href="?pagina=<?= $pagina + 1 ?>">Siguiente &raquo;</a>
        <?php endif; ?>
    </div>

</body>
</html>
