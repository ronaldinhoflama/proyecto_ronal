<?php
session_start();

// Limpiar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de login
header("Location: ../views/login_form.php");
exit();
?>