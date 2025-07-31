<?php
session_start();

// 1. Conectar a la base de datos
$db = new mysqli("localhost", "root", "", "prueva");
if ($db->connect_error) {
    die("Error de conexión: " . $db->connect_error);
}
$db->set_charset("utf8mb4");

// 2. Cerrar sesión si se solicita
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ejercicio34.php");
    exit;
}

// 3. Si ya está logueado, mostrar bienvenida
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "<h2>Bienvenido, " . htmlspecialchars($usuario['nombre']) . "</h2>";
    echo "<p>Tu correo es: " . htmlspecialchars($usuario['email']) . "</p>";
    echo "<p>Tu rol es: " . htmlspecialchars($usuario['rol']) . "</p>";
    echo '<a href="?logout=1">Cerrar sesión</a>';
    exit;
}

// 4. Procesar login
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db, $sql);

    if ($resultado && mysqli_num_rows($resultado) === 1) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Comparar contraseña en texto plano
        if ($usuario['password'] === $password) {
            $_SESSION['usuario'] = $usuario;
            header("Location: ejercicio34.php");
            exit;
        } else {
            $mensaje = 'Contraseña incorrecta.';
        }
    } else {
        $mensaje = 'Usuario no encontrado.';
    }
}
?>

<!-- 5. Formulario de Login -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuarios</title>
    <style>
        body { font-family: Arial; background: #f2f2f2; }
        form { max-width: 400px; margin: 80px auto; padding: 20px; background: white; border-radius: 10px; }
        input, button { width: 100%; padding: 10px; margin-top: 10px; }
        button { background-color: #28a745; color: white; border: none; }
        .mensaje { color: red; margin-top: 10px; }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
        <?php if ($mensaje): ?>
            <p class="mensaje"><?= $mensaje ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
