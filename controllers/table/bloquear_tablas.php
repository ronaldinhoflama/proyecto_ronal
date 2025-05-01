<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesamos las tablas bloqueadas
    $bloqueadas = isset($_POST['bloqueadas']) ? $_POST['bloqueadas'] : [];
    file_put_contents('../../assets/config/bloqueadas.json', json_encode($bloqueadas));

    // Asegurarnos de que la lista de tablas esté disponible después de bloquearlas
    include_once '../../models/Connection.php';
    $conn = (new Connection())->getConnection();
    $result = $conn->query("SHOW TABLES");

    $tablas = [];
    if ($result) {
        while ($row = $result->fetch_array()) {
            $tablas[] = $row[0];
        }
    }

    $bloqueadas = file_exists('../../assets/config/bloqueadas.json')
        ? json_decode(file_get_contents('../../assets/config/bloqueadas.json'), true)
        : [];

    // Ahora pasamos todas las variables necesarias a la vista
    include '../../views/tabla/bloquear_tablas.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Solo obtener las tablas y mostrar la vista
    include_once '../../models/Connection.php';
    $conn = (new Connection())->getConnection();
    $result = $conn->query("SHOW TABLES");

    $tablas = [];
    if ($result) {
        while ($row = $result->fetch_array()) {
            $tablas[] = $row[0];
        }
    }

    $bloqueadas = file_exists('../../assets/config/bloqueadas.json')
        ? json_decode(file_get_contents('../../assets/config/bloqueadas.json'), true)
        : [];

    // Pasar las variables necesarias a la vista
    include '../../views/tabla/bloquear_tablas.php';
    exit;
}
?>
