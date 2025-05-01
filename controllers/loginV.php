<?php
//
include_once "../models/User.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario();
    $resultado = $usuario->login($_POST['email'], $_POST['password']);
    if ($resultado) {
        $_SESSION['usuario'] = $resultado; // Guardamos todo el array del usuario
        if ($resultado['rol_id'] == 1) {
            header("Location: ../views/menu/menu_general.php");
            exit; 
        } else {
            header("Location: ../views/menu/menu_usuario.php");
            exit; 
        }
    } else {
        header("Location: ../views/login_form.php?error=1");
        exit;        
    }
} else {
    include_once "../views/login_form.php";
}
?>