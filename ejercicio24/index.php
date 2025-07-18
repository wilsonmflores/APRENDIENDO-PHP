<!-- crear un formulario html con los siguientes capos:
    -nombre, apellido, biografia, email, imagen, contraseña y rol -->

<?php require_once 'includes/header.php';?>
<h2>Crear usuario</h2>
<form action="" method="POST" enctype ="multipart/form-data">

    <label for="name">Nombre:
    <input type="text" name="name"/>
    <br/>

 <label for="name">
    Apellido:
    <input type="text" name="surname"/>
    </label>
    <br/>

     <label for="name">
    Biografia:
    <textarea name="bio" ></textarea>
    </label>
    <br/>

 <label for="name">
    Correo:
    <input type="email" name="email"/>
    </label>
    <br/>

     <label for="name">
    Imagen:
    <input type="file" name="image"/>
    </label>
    <br/>

     <label for="name">
    Contraseña:
    <input type="password" name="password"/>
    </label>
    <br/>

     <label for="name">
    Rol
    <select name="role">
        <option value ="0">Normal</option>
        <option value ="1">Administrador</option>
    </select>
    </label>
    <br/>

</form>
<?php require_once 'includes/footer.php';?>
