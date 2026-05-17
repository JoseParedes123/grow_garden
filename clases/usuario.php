<?php

require_once "Conexion.php";

class Usuario {

    private $conexion;

    public function __construct() {

        $db = new Conexion();

        $this->conexion = $db->conectar();
    }

    public function registrar($usuario, $email, $password) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Usuario 
        (nombre_usuario, gmail, contraseña, dinero)
        VALUES
        (:usuario, :email, :password, 10)";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":usuario", $usuario);
        $consulta->bindParam(":email", $email);
        $consulta->bindParam(":password", $passwordHash);

        return $consulta->execute();
    }

    public function login($usuario, $password) {

        $sql = "SELECT * FROM Usuario
        WHERE nombre_usuario = :usuario";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":usuario", $usuario);

        $consulta->execute();

        $datos = $consulta->fetch(PDO::FETCH_ASSOC);

        if($datos && password_verify($password, $datos['contraseña'])) {

            return $datos;
        }

        return false;
    }

    public function obtenerDinero($id_usuario) {

        $sql = "SELECT dinero FROM Usuario
        WHERE id_usuario = :id_usuario";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":id_usuario", $id_usuario);

        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }
 
    public function obtenerUsuarioPorId($id_usuario) {

        $sql = "SELECT * FROM Usuario
        WHERE id_usuario = :id_usuario";

        $consulta = $this->conexion->prepare($sql);

        $consulta->bindParam(":id_usuario", $id_usuario);

        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

}

?>