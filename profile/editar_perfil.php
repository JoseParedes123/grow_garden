<?php

session_start();

require_once "../clases/Usuario.php";

$usuario = new Usuario();

$u = $usuario->obtenerUsuarioPorId(
    $_SESSION['id_usuario']
);

?>

<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="style_profile.css">
<head>
    <meta charset="UTF-8">
</head>

<header>
    <div class="header-row">    

        <div class="header-buttons">

            <button id="volver"><a href="user_profile.php">volver</a></button>

        </div>

        <div class="header-title">perfil</div>

    </div>
</header>

<body>

<main class="profile-main">

    <h1 class="profile-title">Editar perfil</h1>

    <div class="profile-info">

<form method="POST"
action="actualizar_perfil.php">

    <input
    type="text"
    name="usuario"
    value="<?php echo $u['nombre_usuario']; ?>">

    <input
    type="email"
    name="gmail"
    value="<?php echo $u['gmail']; ?>">

    </div>

    <button type="submit">
        Guardar cambios
    </button>


</form>

</main>

</body>
</html>