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
    // Método para insertar datos en la tabla
    public function insertar($datos) {
        $this->connect();  // Conectar a la base de datos
        // Generar la consulta SQL para insertar datos
        $campos = implode(", ", array_keys($datos));  // Nombres de los campos
        $valores = implode(", ", array_map(function($item) {
            return "'$item'";  // Escapar los valores
        }, array_values($datos)));  
        $sql = "INSERT INTO `$this->nombreTabla` ($campos) VALUES ($valores)";
        // Ejecutar la consulta
        return $this->connection->query($sql);  // Devolver si fue exitoso
    }

    // Método para actualizar registros en la tabla
    public function actualizar($id, $datos) {
        $this->connect();  // Conectar a la base de datos
        // Generar la consulta SQL para actualizar datos
        $actualizaciones = [];
        foreach ($datos as $campo => $valor) {
            $actualizaciones[] = "`$campo` = '$valor'";  // Preparar cada campo para actualizar
        }
        $actualizacionesStr = implode(", ", $actualizaciones);
        // Consulta SQL para actualizar la tabla
        $sql = "UPDATE `$this->nombreTabla` SET $actualizacionesStr WHERE `$this->pkNombre` = $id";
        // Ejecutar la consulta
        return $this->connection->query($sql);  // Devolver si fue exitoso
    }

    // Método para eliminar registros de la tabla
    public function eliminar($id) {
        $this->connect();  // Conectar a la base de datos
        // Generar la consulta SQL para eliminar registros
        $sql = "DELETE FROM `$this->nombreTabla` WHERE `$this->pkNombre` = $id";
        
        // Ejecutar la consulta
        return $this->connection->query($sql);  // Devolver si fue exitoso
    }
    // Obtener todos los registros de la tabla
    public function obtenerTodos() {
        $this->connect();  // Conectar a la base de datos
        // Consulta SQL para obtener todos los registros
        $sql = "SELECT * FROM `$this->nombreTabla`";
        $result = $this->connection->query($sql);
        // Verificar si la consulta fue exitosa
        if ($result) {
            $datos = [];
            while ($row = $result->fetch_assoc()) {
                $datos[] = $row;  // Guardar los resultados
            }
            return $datos;  // Retornar los registros obtenidos
        } else {
            throw new Exception("No se encontraron registros.");
        }
    }
}
?>
