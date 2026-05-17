<?php

require_once "../clases/Planta.php";

$planta = new Planta();

$plantas = $planta->obtenerPlantas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style_shop.css">
</head>
<body>

<header>
    <div class="header-row">    

        <div class="header-buttons">

            <button id="volver">
                <a href="../index.php">volver</a>
            </button>

            <button id="semillas">
                <a href="shop_seed.php">Semilla</a>
            </button>

            <button id="productos">
                <a href="shop_product.php">Producto</a>
            </button>

        </div>

        <div class="header-title">shop</div>

    </div>
</header>

<main class="shop-main">

<?php foreach($plantas as $p) { ?>

    <div class="shop-item">

        <img src="../pngs/semilla.png">

        <div class="item-info">

            <h3><?php echo $p['nombre']; ?></h3>

            <p>Precio: <?php echo $p['precio']; ?> monedas</p>

            <form method="POST" action="comprar_planta.php">

                <input type="hidden"
                name="id_planta"
                value="<?php echo $p['id_planta']; ?>">

                <button type="submit">
                    Comprar
                </button>

            </form>

        </div>

    </div>

<?php } ?>

</main>

</body>
</html>