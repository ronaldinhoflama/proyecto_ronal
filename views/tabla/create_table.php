<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tabla</title>
    <script src="../../assets/js/create_table.js" defer></script>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <!-- create_table.php -->
    <div class="contenedor create-table-container">
        <h1 class="title">Crear Tabla</h1>
        <?php if (isset($_GET['success'])): ?>
            <div class="exito">¡Tabla creada exitosamente!</div>
        <?php elseif (isset($_GET['error'])): ?>
            <div class="invalido">Hubo un problema al crear la tabla.</div>
        <?php endif; ?>
        <form action="../../controllers/table/tabla_create.php" method="POST" id="tablaForm">
            <div>
                <label for="nombreTabla">Nombre de la Tabla:</label>
                <input type="text" id="nombreTabla" name="nombreTabla" required>
            </div>
            <div>
                <label for="pkNombre">Nombre de Clave Primaria:</label>
                <input type="text" id="pkNombre" name="pkNombre" required>
            </div>
            <div>
                <label for="pkTipo">Tipo de Clave Primaria:</label>
                <select name="pkTipo" id="pkTipo">
                    <option value="INT">INT (Auto Increment)</option>
                    <option value="VARCHAR">VARCHAR</option>
                </select>
            </div>
            <hr>
            <div>
                <h3>Campos adicionales</h3>
                <div id="camposContainer"></div>
                <div>
                    <button type="button" onclick="agregarCampo()">+ Agregar Campo</button>
                </div>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="incluirFecha" id="incluirFecha" value="true">
                    Incluir campo de fecha de ingreso
                </label>
            </div>
            <div>
                <label>
                    <input type="checkbox" name="incluirFechaUpdate" id="incluirFechaUpdate" value="true">
                    Incluir campo de fecha de actualización
                </label>
            </div>
            <div>
                <button type="submit">Crear Tabla</button>
            </div>
        </form>
    </div>
</body>
<script src="../../assets/js/create_table.js"></script>
</html>
