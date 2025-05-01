<?php
// Incluir el modelo Usuario
include_once "../../models/User.php";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eliminar un usuario
    $usuario = new Usuario();
    $usuario->delete($_POST['user_id']);
    header('Location: user_list.php');
    exit;
} else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user = new Usuario();
    $usuario = $user->getFirst($_GET['user_id']);
    if(!$usuario) {
        echo "Usuario con ID {$_GET['user_id']} no encontrado.";
        exit;
    }else{
        include '../../views/user/user_delete_form.php';
        exit;
    }
}
?>
