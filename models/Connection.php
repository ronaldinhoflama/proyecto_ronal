<?php
class Connection {
    protected $connection = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "proyecto_ronal";
    private $port = 3306;

    protected function connect() {
        if ($this->connection === null) {
            $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db, $this->port);
            if (!$this->connection) {
                throw new Exception("No se pudo conectar a la base de datos.");
            }
        }
    }

    // Método público para obtener la conexión
    public function getConnection() {
        $this->connect();
        return $this->connection;
    }
}
?>