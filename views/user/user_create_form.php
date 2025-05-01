<?php
require_once '../../models/Role.php';

$role = new Role();
$roles = $role->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor create-table-container">
        <h1 class="title">Registrar usuario</h1>
        <form action="../../controllers/user/user_create.php" method="POST">
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="apellido">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido" required><br><br>
            <label for="telefono">Telefono:</label><br>
            <input type="text" id="telefono" name="telefono" required><br><br>
            <label for="email">Correo electrónico:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <label for="rol_id">Rol:</label><br>
            <select id="rol_id" name="rol_id" required>
                <option value="">Seleccione un rol</option>
                <?php foreach ($roles as $rol): ?>
                <option value="<?= $rol['rol_id'] ?>"><?= $rol['rol'] ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Registrar</button>
        </form>
    </div>
    <div class="contenedor">
        <a href="user_list.php">Volver</a>
    </div>
</body>
</html>