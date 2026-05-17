<?php

session_start();

require_once "../clases/Conexion.php";

if(!isset($_SESSION['id_usuario'])) {

    die("Debes iniciar sesión");
}

$id_usuario = $_SESSION['id_usuario'];

$id_planta = $_POST['id_planta'];

$db = new Conexion();

$conexion = $db->conectar();


// OBTENER DATOS DE LA PLANTA

$sql = "SELECT * FROM Planta
WHERE id_planta = :id_planta";

$consulta = $conexion->prepare($sql);

$consulta->bindParam(":id_planta", $id_planta);

$consulta->execute();

$planta = $consulta->fetch(PDO::FETCH_ASSOC);


// OBTENER DINERO DEL USUARIO

$sqlUsuario = "SELECT dinero FROM Usuario
WHERE id_usuario = :id_usuario";

$consultaUsuario = $conexion->prepare($sqlUsuario);

$consultaUsuario->bindParam(":id_usuario", $id_usuario);

$consultaUsuario->execute();

$usuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC);


$sqlVerificar = "SELECT * FROM Usuario_Planta
WHERE id_usuario = :id_usuario";

$verificar = $conexion->prepare($sqlVerificar);

$verificar->bindParam(":id_usuario", $id_usuario);

$verificar->execute();

$plantaExistente = $verificar->fetch(PDO::FETCH_ASSOC);

if($plantaExistente) {

        echo "
        <script>
        alert('Ya tienes una planta');
        window.location='shop_seed.php';
        </script>
        ";

exit();
}

// VERIFICAR DINERO

if($usuario['dinero'] < $planta['precio']) {

        echo "
        <script>
        alert('No tienes suficiente dinero');
        window.location='shop_seed.php';
        </script>
        ";

exit();
}


// DESCONTAR DINERO

$nuevoDinero = $usuario['dinero'] - $planta['precio'];

$sqlUpdate = "UPDATE Usuario
SET dinero = :dinero
WHERE id_usuario = :id_usuario";

$update = $conexion->prepare($sqlUpdate);

$update->bindParam(":dinero", $nuevoDinero);

$update->bindParam(":id_usuario", $id_usuario);

$update->execute();


// GUARDAR PLANTA COMPRADA

$sqlInsert = "INSERT INTO Usuario_Planta
(id_usuario, id_planta, nivel_crecimiento)
VALUES
(:id_usuario, :id_planta, 0)";

$insert = $conexion->prepare($sqlInsert);

$insert->bindParam(":id_usuario", $id_usuario);

$insert->bindParam(":id_planta", $id_planta);

$insert->execute();


// VOLVER A LA TIENDA

header("Location: shop_seed.php");

?>