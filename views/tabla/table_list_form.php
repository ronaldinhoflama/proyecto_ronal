<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos de <?= htmlspecialchars($tabla->nombreTabla) ?></title>
    <script>
        const nombreTabla = <?= json_encode($tabla->nombreTabla) ?>;
        const pk = <?= json_encode($tabla->pkNombre ?? 'id') ?>;
        const datos = <?= json_encode($datos) ?>;
    </script>
    <script src="../../assets/js/tables_list.js"></script>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <h2 class="title">Tabla: <?= htmlspecialchars($tabla->nombreTabla) ?></h2>
    <div id="tabla-container"></div>
</body>
</html>
