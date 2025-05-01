<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login_form.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Si el usuario es administrador, redirige al panel de admin
if ($usuario['rol_id'] == 1) {
    header("Location: menu_general.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<script>
    const iframe = document.querySelector('iframe[name="contenido"]');
    iframe.addEventListener('load', () => {
        try {
            const title = iframe.contentDocument.title;
            if (title.includes("Error de Conexión")) {
                window.location.href = "../../views/404.php";
            }
        } catch (e) {
            window.location.href = "../../views/404.php";
        }
    });
</script>
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
                <li><a href="../../controllers/table/tabla_list.php" target="contenido">Lista de Tablas</a></li>
                <li><a href="../../controllers/login_close.php">Cerrar sesión</a></li>
            </ul>
        </nav>
    </div>
    <iframe name="contenido" src=""></iframe>
</body>
</html>
