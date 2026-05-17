<?php

session_start();

require_once "../clases/Usuario.php";

if(!isset($_SESSION['id_usuario'])) {

    header("Location: ../login/login.php");

    exit();
}

$usuario = new Usuario();

$u = $usuario->obtenerUsuarioPorId(
    $_SESSION['id_usuario']
);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_profile.css">
</head>
<body>

<header>
    <div class="header-row">    

        <div class="header-buttons">

            <button id="volver">
                <a href="../index.php">volver</a>
            </button>

        </div>

        <div class="header-title">perfil</div>

    </div>
</header>

    <main class="profile-main">

    <h1 class="profile-title">Perfil de usuario</h1>

<?php ?>

<div class="profile-info">

    <p>
        Nombre de usuario:
        <?php echo $u['nombre_usuario']; ?>
    </p>

    <p>
        Gmail:
        <?php echo $u['gmail']; ?>
    </p>

    <p>
        Dinero:
        <?php echo $u['dinero']; ?> monedas
    </p>

</div>

            <button id="editar"><a href="editar_perfil.php">Editar perfil</a></button>

            <button id="logout"><a href="../login/logout.php">Cerrar sesión</a></button>

    </div>
<?php ?>
</main> 