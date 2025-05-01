<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="contenedor">
        <h1 class="title">Iniciar Sesión</h1>
        <form method="POST" action="../controllers/loginV.php" class="login">
            <?php if (isset($_GET['error'])): ?>
                <div class="invalido">Correo o contraseña incorrectos</div>
            <?php endif; ?>
            <div>
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" required class="input-field">
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" required class="input-field">
            </div>
            <button type="submit" class="button">Entrar</button>
        </form>
    </div>
</body>
</html>
