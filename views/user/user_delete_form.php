<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor create-table-container">
        <h1 class="title">Eliminar usuario</h1>
        <p>¿Estás seguro de que deseas eliminar el siguiente usuario?</p>
        <ul>
            <li><strong>USER_ID:</strong> <?= htmlspecialchars($usuario['user_id']) ?></li>
            <li><strong>Nombre:</strong> <?= htmlspecialchars($usuario['nombre']) ?></li>
            <li><strong>Apellido:</strong> <?= htmlspecialchars($usuario['apellido']) ?></li>
            <li><strong>Telefono:</strong> <?= htmlspecialchars($usuario['telefono']) ?></li>
            <li><strong>Email:</strong> <?= htmlspecialchars($usuario['email']) ?></li>
            <li><strong>Contraseña:</strong> <?= htmlspecialchars($usuario['password']) ?></li>
            <li><strong>Fecha_de_ingreso:</strong> <?= htmlspecialchars($usuario['fecha_de_ingreso']) ?></li>
            <li><strong>Rol_id:</strong> <?= htmlspecialchars($usuario['email']) ?></li>
        </ul>
        <form action="user_delete.php" method="POST">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($usuario['user_id']) ?>">
            <button type="submit">Eliminar</button>
        </form>
    </div>
    <div class="contenedor">
        <a href="user_list.php">Cancelar</a>
    </div>
</body>
</html>