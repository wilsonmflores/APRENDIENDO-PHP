<?php
require_once 'ejercicio27.php'; // Incluye la conexión

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y sanitizar los datos
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($db, $_POST['apellido']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = isset($_POST['rol']) ? mysqli_real_escape_string($db, $_POST['rol']) : 'usuario';
    $biografia = mysqli_real_escape_string($db, $_POST['biografia']);

    // Consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, apellido, email, password, rol, biografia)
            VALUES ('$nombre', '$apellido', '$email', '$password', '$rol', '$biografia')";

    // Ejecutar e informar
    if (mysqli_query($db, $sql)) {
        $mensaje = "✅ Usuario guardado correctamente.";
    } else {
        $error = "❌ Error al guardar el usuario: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
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
            background-color: #007BFF;
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
        <h2>Registrar Nuevo Usuario</h2>

        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (isset($mensaje)): ?>
            <div class="success"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <label for="rol">Rol:</label>
            <select name="rol">
                <option value="usuario">Usuario</option>
                <option value="admin">Administrador</option>
                <option value="editor">Editor</option>
            </select>

            <label for="biografia">Biografía:</label>
            <textarea name="biografia" rows="4"></textarea>

            <button type="submit">Guardar Usuario</button>
        </form>

        <a class="back-link" href="ejercicio31.php">← Volver al formulario</a>
    </div>
</body>
</html>
