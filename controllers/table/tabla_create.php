<?php
// Incluir el modelo Tabla
include_once "../../models/Table.php";
// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Crear una nueva instancia del modelo Tabla
    $tabla = new Tabla();
    
    // Asignar los valores del formulario a las propiedades del objeto
    $tabla->nombreTabla = $_POST['nombreTabla'];
    $tabla->pkNombre = $_POST['pkNombre'];
    $tabla->pkTipo = $_POST['pkTipo'];
    $tabla->campos = $_POST['campos'];
    $tabla->incluirFecha = isset($_POST['incluirFecha']) ? 'true' : 'false';
    $tabla->incluirFechaUpdate = isset($_POST['incluirFechaUpdate']) ? 'true' : 'false';
    
    // Llamar al método create para crear la tabla en la base de datos
    $resultado = $tabla->create();  // Si la creación es exitosa, devuelve true

    if ($resultado) {
        header("Location: ../../views/tabla/create_table.php?success=1");
    } else {
        header("Location: ../../views/tabla/create_table.php?error=1");
    }
    exit;    

} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once "../../views/tabla/create_table.php";
    exit;
}
?>
