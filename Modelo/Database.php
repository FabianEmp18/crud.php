<?php
class Database {
    private $host = "localhost";
    private $db_name = "rest_api_demo"; // Cambia esto al nombre correcto de tu base de datos
    private $username = "root"; // Usuario de la base de datos (asegúrate de que este sea correcto)
    private $password = ""; // Contraseña de la base de datos (asegúrate de que este sea correcto)
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
