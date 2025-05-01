<?php
// Incluir el modelo Usuario
include_once "../../models/User.php";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizar un usuario
    $usuario = new Usuario();
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellido = $_POST['apellido'];
    $usuario->telefono = $_POST['telefono'];
    $usuario->email = $_POST['email'];
    $usuario->password = $_POST['password'];
    $usuario->rol_id = $_POST['rol_id'];
    $usuario->update($_POST['user_id']);  // Actualizar el usuario

    header('Location: user_list.php');
    exit;
} else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Si es por GET, redirigir al formulario de actualización con los datos del usuario actuales
    $usuario= new Usuario();
    $usuarios = $usuario->getFirst($_GET['user_id']);
    if(!$usuarios) {
        echo "Usuario con ID {$_GET['user_id']} no encontrado.";
        exit;
    }else{
        include '../../views/user/user_update_form.php';
        exit;
    }
}
?>
