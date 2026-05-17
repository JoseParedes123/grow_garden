<?php

session_start();

require_once "../clases/Usuario.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $user = new Usuario();

    $datos = $user->login(
        $usuario,
        $password
    );

    if($datos) {

        $_SESSION['id_usuario'] = $datos['id_usuario'];

        $_SESSION['usuario'] = $datos['nombre_usuario'];

        header("Location: ../index.php");

    } else {

        echo "
            <script>
                alert('Usuario o contraseña incorrectos');
                window.location='login.php';
            </script>
        ";
    }
}
?>