*/Crear una pagina de edicion de usuarios/*

<?php
require_once 'ejercicio27.php'; // conexión

// Verificar si hay un ID en la URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("❌ Error: No se proporcionó un ID de usuario.");
}

$id = intval($_GET['id']); // Asegurar que sea número

// Buscar el usuario
$resultado = $db->query("SELECT * FROM usuarios WHERE id = $id");
if ($resultado->num_rows === 0) {
    die("❌ Usuario no encontrado.");
}

$usuario = $resultado->fetch_assoc();

// Actualizar datos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $rol = mysqli_real_escape_string($db, $_POST['rol']);
    $biografia = mysqli_real_escape_string($db, $_POST['biografia']);

    // Solo actualizar contraseña si se escribió una nueva
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET 
                    nombre = '$nombre', 
                    apellido = '$apellido', 
                    email = '$email',
                    password = '$password',
                    rol = '$rol',
                    biografia = '$biografia'
                WHERE id = $id";
    } else {
        $sql = "UPDATE usuarios SET 
                    nombre = '$nombre', 
                    apellido = '$apellido', 
                    email = '$email',
                    rol = '$rol',
                    biografia = '$biografia'
                WHERE id = $id";
    }

    if ($db->query($sql)) {
        $mensaje = "✅ Usuario actualizado correctamente.";
        // Volver a cargar datos
        $resultado = $db->query("SELECT * FROM usuarios WHERE id = $id");
        $usuario = $resultado->fetch_assoc();
    } else {
        $error = "❌ Error al actualizar: " . $db->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            margin-top: 12px;
            display: block;
        }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border-radius: 4px;
            border: 1px solid #aaa;
        }
        button {
            margin-top: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
        .back-link {
            display: block;
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Editar Usuario</h2>

        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($mensaje)): ?>
            <div class="success"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required value="<?= htmlspecialchars($usuario['nombre']) ?>">

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required value="<?= htmlspecialchars($usuario['apellido']) ?>">

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required value="<?= htmlspecialchars($usuario['email']) ?>">

            <label for="password">Nueva Contraseña (dejar en blanco si no deseas cambiarla):</label>
            <input type="password" name="password">

            <label for="rol">Rol:</label>
            <select name="rol">
                <option value="usuario" <?= $usuario['rol'] == 'usuario' ? 'selected' : '' ?>>Usuario</option>
                <option value="admin" <?= $usuario['rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                <option value="editor" <?= $usuario['rol'] == 'editor' ? 'selected' : '' ?>>Editor</option>
            </select>

            <label for="biografia">Biografía:</label>
            <textarea name="biografia" rows="4"><?= htmlspecialchars($usuario['biografia']) ?></textarea>

            <button type="submit">Actualizar</button>
        </form>

        <a class="back-link" href="ejercicio31.php">← Volver a crear usuario</a>
    </div>
</body>
</html>
