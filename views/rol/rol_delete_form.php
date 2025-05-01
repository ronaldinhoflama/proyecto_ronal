<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor create-table-container">
        <h1 class="title">Eliminar role</h1>
        <p>¿Estás seguro de que deseas eliminar el siguiente rol?</p>
        <ul>
            <li><strong>Rol_ID:</strong> <?= htmlspecialchars($roles['rol_id']) ?></li>
            <li><strong>Rol:</strong> <?= htmlspecialchars($roles['rol']) ?></li>
            <li><strong>Descripcion:</strong> <?= htmlspecialchars($roles['descripcion']) ?></li>
            <li><strong>Creado_en:</strong> <?= htmlspecialchars($roles['creado_en']) ?></li>
            <li><strong>Actualizado_en:</strong> <?= htmlspecialchars($roles['actualizado_en']) ?></li>
        </ul>
        <form action="rol_delete.php" method="POST">
            <input type="hidden" name="rol_id" value="<?= htmlspecialchars($roles['rol_id']) ?>">
            <button type="submit">Eliminar</button>
        </form>
    </div>
    <div class="contenedor">
        <a href="rol_list.php">Cancelar</a>
    </div>
</body>
</html>