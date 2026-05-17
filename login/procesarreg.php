<?php

require_once "../clases/Usuario.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $confirm = $_POST['confirm_password'];


    // VALIDAR CONTRASEÑAS

    if($password != $confirm) {

        echo "
        <script>
        alert('Las contraseñas no coinciden');
        window.location='registro.php';
        </script>
        ";

        exit();
    }


    // REGISTRAR

    $user = new Usuario();

    $registro = $user->registrar(
        $usuario,
        $email,
        $password
    );


    // SI FUNCIONA

    if($registro) {

    header("Location: login.php");

    } else {

        echo "
        <script>
        alert('Error al registrar');
        window.location='registro.php';
        </script>
        ";

        exit();
    }
}

?>