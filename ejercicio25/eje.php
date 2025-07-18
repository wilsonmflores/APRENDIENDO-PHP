<?php require_once 'includes/header.php'; ?>
<h2>Crear usuario</h2>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" name="name" id="name" class="form-control w-50"/>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Apellido:</label>
        <input type="text" name="surname" id="surname" class="form-control w-50"/>
    </div>

    <div class="mb-3">
        <label for="bio" class="form-label">Biografía:</label>
        <textarea name="bio" id="bio" class="form-control w-50"></textarea>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo:</label>
        <input type="email" name="email" id="email" class="form-control w-50"/>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Imagen:</label>
        <input type="file" name="image" id="image" class="form-control w-50"/>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" name="password" id="password" class="form-control w-50"/>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Rol:</label>
        <select name="role" id="role" class="form-control w-50">
            <option value="0">Normal</option>
            <option value="1">Administrador</option>
        </select>
    </div>

    <input type="submit" value="Enviar" class="btn btn-success"/>

</form>
<?php require_once 'includes/footer.php'; ?>
