<?php
include_once "../../models/User.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = new Usuario();
    $usuario->nombre = $_POST['nombre'];
    $usuario->apellido = $_POST['apellido'];
    $usuario->telefono = $_POST['telefono'];
    $usuario->email = $_POST['email'];
    $usuario->password = $_POST['password'];
    $usuario->rol_id = $_POST['rol_id'];
    $usuario->create();  
    header('Location: user_list.php');
    exit;
} else if($_SERVER['REQUEST_METHOD'] == 'GET') {
    include '../../views/user/user_create_form.php';
    exit;
}
?>
