<?php
include_once "../../models/Role.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = new Role();
    $role->rol = $_POST['rol'];
    $role->descripcion = $_POST['descripcion'];
    $role->create();  // Crear el rol
    header('Location: rol_list.php');
    exit;
} else {
    include_once "../../views/rol/rol_create_form.php"; 
    exit;
}
?>
