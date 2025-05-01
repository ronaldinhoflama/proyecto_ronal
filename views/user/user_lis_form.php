<?php
require_once '../../models/Role.php';

$role = new Role();
$roles = $role->getAll();
$roles_por_id = [];

foreach ($roles as $r) {
    $roles_por_id[$r['rol_id']] = $r['rol'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1 class="title">Lista de Usuarios</h1>
    <div class="contenedor">
        <a href="user_create.php">Registrar nuevo usuario</a>
    </div>
    <table >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Fecha de creación</th>
            <th>Rol ID</th>
            <th>Rol</th> 
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>
        <?php if (!empty($usuarios)): ?>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['user_id']) ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['apellido']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefono']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['password']) ?></td>
                    <td><?= htmlspecialchars($usuario['fecha_de_ingreso']) ?></td>
                    <td><?= htmlspecialchars($usuario['rol_id']) ?></td>
                    <td><?= htmlspecialchars($roles_por_id[$usuario['rol_id']] ?? 'Desconocido') ?></td>
                    <td>
                        <a href="user_update.php?user_id=<?= $usuario['user_id'] ?>">Actualizar</a>
                    </td>
                    <td>
                        <a href="user_delete.php?user_id=<?= $usuario['user_id'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="11">No hay usuarios registrados.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
