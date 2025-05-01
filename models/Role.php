<?php
include_once "Connection.php";

class Role extends Connection {
    public $rol_id;
    public $rol;
    public $descripcion;
    public $creaco_en;
    public $actualizado_en;

    // Crear un nuevo rol
    public function create() {
        $this->connect();
        $stmt = $this->connection->prepare("INSERT INTO roles (rol, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $this->rol, $this->descripcion);
        $stmt->execute();
        $stmt->close();
    }

    // Eliminar rol por ID
    public function delete($rol_id) {
        $this->connect();
        $stmt = $this->connection->prepare("DELETE FROM roles WHERE rol_id = ?");
        $stmt->bind_param("i", $rol_id);
        $stmt->execute();
        $stmt->close();
    }

    // Obtener todos los roles
    public function getAll() {
        $this->connect();
        $stmt = $this->connection->prepare("SELECT * FROM roles");
        $stmt->execute();
        $result = $stmt->get_result();
        $roles = array();
        while ($row = $result->fetch_assoc()) {
            array_push($roles, $row);
        }
        return $roles;
    }   
    // Obtener un rol por ID
    public function getFirst($rol_id) {
        $this->connect();
        $stmt = $this->connection->prepare("SELECT * FROM roles WHERE rol_id = ?");
        $stmt->bind_param("i", $rol_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    // Actualizar rol
    public function update($rol_id) {
        $this->connect();
        $stmt = $this->connection->prepare("UPDATE roles SET rol = ?, descripcion = ? WHERE rol_id = ?");
        $stmt->bind_param("ssi", $this->rol, $this->descripcion, $rol_id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
