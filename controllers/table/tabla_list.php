<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../../controllers/login_form.php");
    exit();
}

$usuario = $_SESSION['usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header("Location: ../../views/tabla/seach_table.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../../models/Table.php';

    $bloqueadas = file_exists('../../assets/config/bloqueadas.json')
        ? json_decode(file_get_contents('../../assets/config/bloqueadas.json'), true)
        : [];

    $nombreTabla = $_POST['nombreTabla'];

    if ($usuario['rol_id'] != 1 && in_array($nombreTabla, $bloqueadas)) {
        header("Location: ../../views/tabla/seach_table.php?error=1");
    } else {
        $tabla = new Tabla();
        $tabla->nombreTabla = $nombreTabla;
        try {
            $datos = $tabla->obtenerTodos();
            include "../../views/tabla/table_list_form.php";
        } catch (Exception $e) {
            header("Location: ../../views/tabla/seach_table.php?error=2");
        }
    }
    exit;
}
?>

