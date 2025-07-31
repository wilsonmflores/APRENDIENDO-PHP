<?php
require_once 'ejercicio27.php'; // conexión

// Mostrar usuario a editar
$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID no proporcionado");
}

$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = mysqli_query($db, $sql);
$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    die("Usuario no encontrado");
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $biografia = $_POST['biografia'];

    // Imagen (si se subió)
    if (!empty($_FILES['imagen']['name'])) {
        $nombreImagen = time() . '_' . $_FILES['imagen']['name'];
        $ruta = 'uploads/' . $nombreImagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
    } else {
        $ruta = $usuario['imagen']; // Mantener imagen anterior
    }

    // Actualizar
    $update = "UPDATE usuarios SET 
                nombre='$nombre', 
                apellido='$apellido', 
                email='$email', 
                biografia='$biografia', 
                imagen='$ruta' 
                WHERE id = $id";
    mysqli_query($db, $update);

    header("Location: ejercicio31.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        form { background: #fff; padding: 20px; max-width: 500px; margin: auto; border-radius: 8px; }
        label { display: block; margin-top: 10px; }
        input, textarea { width: 100%; padding: 8px; margin-top: 5px; }
        button { margin-top: 15px; background: blue; color: white; padding: 10px; border: none; border-radius: 5px; }
        img { margin-top: 10px; max-width: 150px; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Editar Usuario</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>

        <label>Apellido:</label>
        <input type="text" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>

        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>

        <label>Biografía:</label>
        <textarea name="biografia"><?= htmlspecialchars($usuario['biografia']) ?></textarea>

        <label>Imagen:</label>
        <input type="file" name="imagen">
        <?php if (!empty($usuario['imagen'])): ?>
            <img src="<?= $usuario['imagen'] ?>" alt="Foto actual">
        <?php endif; ?>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
