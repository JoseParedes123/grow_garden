<?php

require_once "../clases/Producto.php";

$producto = new Producto();

$productos = $producto->obtenerProductos();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_shop.css">
    <title>TreeGrowr - Productos</title>
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

<?php foreach($productos as $p) { ?>

    <div class="shop-item">

        <img src="../pngs/regador.png" alt="regador">

        <div class="item-info">

            <h3><?php echo $p['nombre']; ?></h3>

            <p>Precio: <?php echo $p['precio']; ?> monedas</p>

            <button>Comprar</button>

        </div>

    </div>

<?php } ?>

</main>

</body>
</html>