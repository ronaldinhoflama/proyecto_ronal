<?php
include_once "Connection.php";

class Usuario extends Connection {
    // Definimos los atributos del Usuario
    public $user_id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $fecha_de_ingreso;
    public $password;  // Atributo para la password
    public $rol_id; // Atributo para el rol del usuario

    // Creación de usuario
    public function create() {
        $this->connect();
        $stmt = $this->connection->prepare("INSERT INTO usuario (nombre, apellido, telefono, email, password, rol_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $this->nombre, $this->apellido, $this->telefono, $this->email, $this->password, $this->rol_id);  // Agregar rol_id al insert
        $stmt->execute();
        $stmt->close();
    }

    // Eliminación de usuario
    public function delete($user_id) {
        $this->connect();
        $stmt = $this->connection->prepare("DELETE FROM usuario WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->close();
    }

    // Actualización de usuario
    public function update($user_id) {
        $this->connect();
        $stmt = $this->connection->prepare("UPDATE usuario SET nombre = ?, apellido = ?, telefono = ?, email = ?, password = ?, rol_id = ? WHERE user_id = ?");
        $stmt->bind_param("sssssii", $this->nombre, $this->apellido, $this->telefono, $this->email, $this->password, $this->rol_id, $user_id);  // Agregar rol_id al update
        $stmt->execute();
        $stmt->close();
    }

    // Obtener todos los usuarios
    public function getAll() {
        $this->connect();
        $stmt = $this->connection->prepare("SELECT * FROM usuario");
        $stmt->execute();
        $result = $stmt->get_result();
        $users = array();
        while ($row = $result->fetch_assoc()) {
            array_push($users, $row);
        }
        return $users;
    }

    // Obtener un usuario por su id
    public function getFirst($user_id) {
        $this->connect();
        $stmt = $this->connection->prepare("SELECT * FROM usuario WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Login de usuario
    public function login($email, $password) {
        $this->connect();
        $stmt = $this->connection->prepare("SELECT * FROM usuario WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email,$password); 
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
