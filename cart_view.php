<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'cart.php';
?>
<!DOCTYPE HTML>
<html class="ico_b">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <div class="titu">
        <div class="flex_logo">
            <div class="logo_div">
                <a href="/store" class="icono_href">
                    <img class="logo_img" src="iconos/logo.png" title="logo">
                </a>
            </div>
            <h1 class="titulo_h1" id="WONKA">CARRITO DE COMPRAS</h1>
            <img class="img_wonka" src="iconos/wonka.png">
          
            
        </div>
    </div>
</head>
<body>
<div class="divcen">
        <?php
        if (empty($_SESSION['cart'])) {
        ?>
            <p class="c_vasi" >El carrito está vacío.</p>
        <?php
        } else {
            $total_carrito = 0; // Inicializar el total del carrito
        ?>
            
            <?php foreach ($_SESSION['cart'] as $item): ?>
                
                <div class="tabla" class="flex">
                
                    <img src="<?= $item['ruta_imagen'] ?>" alt="<?= $item['nombre_producto'] ?>" class="tabla_img">
                    <p><?= $item['nombre_producto'] ?></p>
                    <p>Precio: $<?= $item['precio_unitario'] ?> MXN</p>
                    <p>Cantidad: <?= $item['cantidad'] ?></p>
                    <?php 
                $t_pro = $item['precio_unitario'] * $item['cantidad'];
                ?>
                <p>total estas cantidades: $<?= $t_pro ?> MXN</p>

                </div>
                
                <?php 
                $t_pro = $item['precio_unitario'] * $item['cantidad'];
                // Calcular el precio total de cada tipo de artículo
                $precio_total_articulo = $item['precio_unitario'] * $item['cantidad'];
                // Sumar el precio total de cada tipo de artículo al total del carrito
                $total_carrito += $precio_total_articulo;
                ?>
                
            <?php endforeach; ?>
            
            </div>
            
            <h1 class="h_t" >Total del carrito: $<?= $total_carrito ?> MXN</h1> <!-- Mostrar el total del carrito -->
            <h2 class="h_t" >Total de artículos: <?= getCartTotalQuantity() ?></h2>
            <div class="center">
            <div class="form_flex" >
            <form action="cart_checkout.php" method="post" style="display:inline;">
                <button type="submit" class="btn_comprar">Comprar</button>
            </form>
            <form action="cart_empty.php" method="post" style="display:inline;">
                <button type="submit" class="btn_var">Vaciar Carrito</button>
            </form></div>
            <a href="/store"><p>Volver a la tienda</p></a>
            </div>
        <?php
        }
        ?>
    
    </div>
    
</body>
</html>
