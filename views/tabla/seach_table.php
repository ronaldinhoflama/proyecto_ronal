<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Tabla</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="create-table-container">
        <!-- Mensajes -->
        <?php if (isset($_GET['error'])): ?>
            <div class="invalido">
                <?php
                if ($_GET['error'] == 1) {
                    echo "La tabla está bloqueada y no se puede acceder.";
                } elseif ($_GET['error'] == 2) {
                    echo "Error al obtener los datos de la tabla.";
                }
                ?>
            </div>
        <?php endif; ?>
        <form action="../../controllers/table/tabla_list.php" method="POST">
            <h2 class="title">Ver datos de una tabla</h2>
            <label>Nombre de la tabla:</label>
            <input type="text" name="nombreTabla" required>
            <button type="submit">Ver Tabla</button>
        </form>
    </div>
</body>
</html>
