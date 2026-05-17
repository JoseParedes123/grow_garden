<?php

require_once "Conexion.php";

class Producto {

    private $conexion;

    public function __construct() {

        $db = new Conexion();

        $this->conexion = $db->conectar();
    }

    public function obtenerProductos() {

        $sql = "SELECT * FROM Producto";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>