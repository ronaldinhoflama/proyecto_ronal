<?php
$bloqueadasGuardadas = file_exists('../../assets/config/bloqueadas.json')
    ? json_decode(file_get_contents('../../assets/config/bloqueadas.json'), true)
    : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bloquear Tablas</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h1>Seleccionar Tablas a Bloquear</h1>
    <form method="POST" action="../../controllers/table/bloquear_tablas.php">
        <ul>
            <?php foreach ($tablas as $tabla): ?>
                <li>
                    <label>
                        <input type="checkbox" name="bloqueadas[]" value="<?= htmlspecialchars($tabla) ?>"
                        <?= in_array($tabla, $bloqueadasGuardadas) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($tabla) ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit">Guardar Bloqueos</button>
    </form>
</body>
</html>
