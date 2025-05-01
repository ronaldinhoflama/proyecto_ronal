<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar rol</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Actualizar roles</h1>
    <form action="rol_update.php" method="POST">
        <input type="hidden" name="rol_id" value="<?= htmlspecialchars($roles['rol_id']) ?>">

        <label for="rol">Rol:</label><br>
        <input type="name" id="rol" name="rol" value="<?= htmlspecialchars($roles['rol']) ?>" required><br><br>

        <label for="descripcion">Descripcion:</label><br>
        <input type="text" id="descripcion" name="descripcion" value="<?= htmlspecialchars($roles['descripcion']) ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <a href="rol_list.php">Volver a la lista</a>
</body>
</html>