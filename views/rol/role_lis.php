<?php if (isset($roles) && !empty($roles)): ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Roles</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Lista de Roles</h1>
    <a href="rol_create.php">Registrar nuevo rol</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Rol</th>
            <th>Descripción</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach ($roles as $rol): ?>
            <tr>
                <td><?= htmlspecialchars($rol['rol_id']) ?></td>
                <td><?= htmlspecialchars($rol['rol']) ?></td>
                <td><?= htmlspecialchars($rol['descripcion']) ?></td>
                <td><?= htmlspecialchars($rol['creado_en']) ?></td>
                <td><?= htmlspecialchars($rol['actualizado_en']) ?></td>
                <td>
                    <a href="rol_update.php?rol_id=<?= $rol['rol_id'] ?>">Actualizar</a>
                </td>
                <td>
                    <a href="rol_delete.php?rol_id=<?= $rol['rol_id'] ?>">Eliminar</a>
                </td>
                </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php else: ?>
    <p>No hay roles registrados.</p>
<?php endif; ?>
