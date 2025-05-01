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
            try {
                $this->connection = @mysqli_connect($this->host, $this->user, $this->password, $this->db, $this->port);
                if (!$this->connection) {
                    throw new Exception("No se pudo conectar a la base de datos.");
                }
            } catch (Exception $e) {
                echo "<script>window.top.location.href = '/PROYECTO_VERSION1/views/404.php';</script>";
                exit();
            }
        }
    }

    public function getConnection() {
        $this->connect();
        return $this->connection;
    }
}

?>
