<?php
include_once "Connection.php";

class Tabla extends Connection {
    public $nombreTabla;
    public $pkNombre;
    public $pkTipo;
    public $campos;
    public $incluirFecha;
    public $incluirFechaUpdate;
    //creacion de la tabla
    public function create() {
        $this->connect();
        $sql = "CREATE TABLE IF NOT EXISTS `$this->nombreTabla` (";
        // Clave primaria
        if ($this->pkTipo == 'INT') {
            $sql .= "`$this->pkNombre` INT PRIMARY KEY AUTO_INCREMENT";
        } else {
            $sql .= "`$this->pkNombre` VARCHAR(100) PRIMARY KEY";
        }
        $foreignKeys = [];
        // Campos adicionales
        foreach ($this->campos as $campo) {
            $nombreCampo = $campo['nombre'];
            $tipoCampo = $campo['tipo'];
            $esFK = isset($campo['es_fk']) && $campo['es_fk'] === 'true';
            $tablaFK = $campo['tabla_fk'] ?? '';
            $columnaFK = $campo['columna_fk'] ?? '';
            $sql .= ", `$nombreCampo` $tipoCampo";
            if ($esFK && $tablaFK && $columnaFK) {
                $foreignKeys[] = "FOREIGN KEY (`$nombreCampo`) REFERENCES `$tablaFK`(`$columnaFK`)";
            }
        }
        // Campos de fecha
        if ($this->incluirFecha == 'true') {
            $sql .= ", `fecha_de_ingreso` TIMESTAMP DEFAULT CURRENT_TIMESTAMP";
        }
        if ($this->incluirFechaUpdate == 'true') {
            $sql .= ", `actualizado_en` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        }
        // Llaves foráneas
        if (!empty($foreignKeys)) {
            $sql .= ", " . implode(", ", $foreignKeys);
        }
        $sql .= ");";
        return $this->connection->query($sql);
    }

    // Obtener todos los registros
    public function obtenerTodos() {
        $this->connect();
        $sql = "SELECT * FROM `$this->nombreTabla`";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $datos = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;
            }
            $stmt->close();  // Cerrar la declaración
            return $datos;
        } else {
            $stmt->close();  // Cerrar la declaración
            throw new Exception("No se encontraron registros.");
        }
    }
}
?>
