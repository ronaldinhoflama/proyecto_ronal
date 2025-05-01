<?php
// Incluir el modelo Role
include_once "../../models/Role.php";

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Actualizar un rol
    $role = new Role();
    $role->rol = $_POST['rol'];
    $role->descripcion = $_POST['descripcion'];
    $role->update($_POST['rol_id']);  // Actualizar el rol

    header('Location: rol_list.php');
    exit;} else {
    // Si es GET, redirigir al formulario de actualizar rol
    if (isset($_GET['rol_id'])) {
        $role = new Role();
        $roles = $role->getFirst($_GET['rol_id']);  // Obtener los datos del rol
        include_once "../../views/rol/rol_update_form.php";  // Mostrar el formulario con los datos del rol
    } else {
        echo "ID de rol no proporcionado.";
    }
}
?>
