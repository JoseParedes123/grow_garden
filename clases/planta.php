<?php

require_once "Conexion.php";

class Planta {

    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function obtenerPlantas() {

        $sql = "SELECT * FROM Planta";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>