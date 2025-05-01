<?php
session_start();  

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];  
} else {
    header("Location: login_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú General</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="contenedor">
        <!-- Barra de navegación -->
        <nav class="menu">
            <!-- Información del usuario -->
            <div class="user-info">
                <div class="user-avatar">
                    <img src="../../assets/images/iconoR.jpeg" alt="User Avatar">
                </div>
                <div class="user-detalle">
                    <h3>Bienvenido, <?php echo htmlspecialchars($usuario['nombre']); ?></h3>
                    <p><strong>Correo:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
                    <p><strong>Rol:</strong> <?php echo ($usuario['rol_id'] == 1) ? 'Administrador' : 'Usuario'; ?></p>
                </div>
            </div>
            <h2>Panel de Control</h2>
            <ul class="menu-list">
                <li><a href="../../controllers/table/tabla_create.php" target="contenido">Crear Tabla</a></li>
                <li><a href="../../controllers/table/tabla_list.php" target="contenido">Ver Tablas</a></li>
                <li><a href="../../controllers/user/user_list.php" target="contenido">Usuarios</a></li>
                <li><a href="../../controllers/rol/rol_list.php" target="contenido">Roles</a></li>
                <li><a href="../../controllers/table/bloquear_tablas.php" target="contenido">Bloquear Tablas</a></li>
                <li><a href="../../controllers/login_close.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
    <iframe name="contenido" src=""></iframe>
</body>
</html>
