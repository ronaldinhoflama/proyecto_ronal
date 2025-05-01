<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Actualizar usuario</h1>
    <form action="user_update.php" method="POST">
        <input type="hidden" name="user_id" value="<?= htmlspecialchars($usuarios['user_id']) ?>">

        <label for="nombre">Nombre:</label><br>
        <input type="name" id="nombre" name="nombre" value="<?= htmlspecialchars($usuarios['nombre']) ?>" required><br><br>

        <label for="apeliido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($usuarios['apellido']) ?>" required><br><br>

        <label for="telefono">Telefono:</label><br>
        <input type="text" id="telefono" name="telefono" value="<?= htmlspecialchars($usuarios['telefono']) ?>" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($usuarios['email']) ?>" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" value="<?= htmlspecialchars($usuarios['password']) ?>" required><br><br>

        <label for="rol_id">Rol_id:</label><br>
        <input type="number" id="rol_id" name="rol_id" value="<?= htmlspecialchars($usuarios['rol_id']) ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="user_list.php">Volver a la lista</a>
</body>
</html>