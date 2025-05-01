<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar rol</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor create-table-container">
        <h1 class="title">Registrar rol</h1>
        <form action="../../controllers/rol/rol_create.php" method="POST">
            <label for="rol">Rol:</label><br>
            <input type="text" id="rol" name="rol" required><br><br>
            <label for="descripcion">Descripcion:</label><br>
            <input type="text" id="descripcion" name="descripcion" required><br><br>
            <button type="submit">Registrar</button>
        </form>
    </div>
    <div class="contenedor">
        <a href="rol_list.php">Volver a la lista</a>
    </div>
</body>
</html>