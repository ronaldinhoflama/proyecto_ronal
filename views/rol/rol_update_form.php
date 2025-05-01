<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar rol</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor create-table-container">
        <h1 class="title">Actualizar roles</h1>
        <form action="rol_update.php" method="POST">
            <input type="hidden" name="rol_id" value="<?= htmlspecialchars($roles['rol_id']) ?>">
            <label for="rol">Rol:</label><br>
            <input type="name" id="rol" name="rol" value="<?= htmlspecialchars($roles['rol']) ?>" required><br><br>
            <label for="descripcion">Descripcion:</label><br>
            <input type="text" id="descripcion" name="descripcion" value="<?= htmlspecialchars($roles['descripcion']) ?>" required><br><br>
            <button type="submit">Actualizar</button>
        </form>
    </div>
    <div class="contenedor">
        <a href="rol_list.php">Volver a la lista</a>
    </div>
</body>
</html>