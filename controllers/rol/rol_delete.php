<?php
    include_once "../../models/Role.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $role = new Role();
        $role->delete($_POST['rol_id']);  // Eliminar el rol
        header('Location: rol_list.php');
        exit;
    } else if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $role = new Role();
        $roles = $role->getFirst($_GET['rol_id']);
        if(!$roles) {
            echo "Role con ID {$_GET['rol_id']} no encontrado.";
            exit;
        }else{
            include '../../views/rol/rol_delete_form.php';
            exit;
        }
    }
?>
