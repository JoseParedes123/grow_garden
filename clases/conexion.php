<?php

class Conexion {
    private $host = "localhost";
    private $db = "treegrowr_db";
    private $user = "root";
    private $pass = "";

    public function conectar() {
        try {
            $conexion = new PDO(
                "mysql:host=$this->host;dbname=$this->db;charset=utf8",
                $this->user,
                $this->pass
            );

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;

        } catch(PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>