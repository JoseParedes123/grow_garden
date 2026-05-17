<?php

session_start();

require_once "../clases/Conexion.php";

$db = new Conexion();

$conexion = $db->conectar();

$id_usuario = $_SESSION['id_usuario'];

$usuario = $_POST['usuario'];

$gmail = $_POST['gmail'];

$sql = "UPDATE Usuario
SET nombre_usuario = :usuario,
gmail = :gmail
WHERE id_usuario = :id_usuario";

$consulta = $conexion->prepare($sql);

$consulta->bindParam(":usuario", $usuario);

$consulta->bindParam(":gmail", $gmail);

$consulta->bindParam(":id_usuario", $id_usuario);

$consulta->execute();

header("Location: perfil.php");

?>