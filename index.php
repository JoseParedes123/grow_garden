<?php

session_start();

if(!isset($_SESSION['id_usuario'])) {

    header("Location: login/login.php");

    exit();
}

require_once "clases/Usuario.php";

$usuario = new Usuario();

$dinero = $usuario->obtenerDinero($_SESSION['id_usuario']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="java.js"></script>
    <title>Document</title>
</head>
<body class="game-page">

<header>
    <div class="header-row">    

        <div class="header-buttons">

            <button id="tienda">
                <a href="shop\shop_seed.php">tienda</a>
            </button>

            <button id="vender">
                <a href="">vender</a>
            </button>

            <button id="perfil">
                <a href="profile/user_profile.php">Perfil</a>
            </button>

            <p class="money"> <?php echo $_SESSION['usuario']; ?> | 💰 <?php echo $dinero['dinero']; ?></p>

        </div>

        <div class="header-title">navbar</div>

    </div>
</header>

    <main class="cesped">
            
            <div class="Arboles">

                <img id="planta" src="diseños/nivel1.png" alt="arbol">

            </div>
            <div class="regadera">
                <img src="diseños/regadera.png" alt="regardera">
            </div>
            <div id="contador">
                <h1>01:00:00</h1>
            </div>
            <div id="regador">
            <button onclick="regar()">regar</button>
            </div>
    </main>
    
</body>
</html>