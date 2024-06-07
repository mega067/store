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
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="cart-container">
        <h1>Carrito de Compras</h1>
        <?php
        if (empty($_SESSION['cart'])) {
            echo '<p>El carrito está vacío.</p>';
        } else {
            echo '<ul>';
            foreach ($_SESSION['cart'] as $item) {
                echo '<li>';
                echo '<img src="' . $item['ruta_imagen'] . '" alt="' . $item['nombre_producto'] . '" width="50" height="50">';
                echo '<p>' . $item['nombre_producto'] . ' - ' . $item['ruta_imagen'] . '</p>';
                echo '<p>Precio: $' . $item['precio_unitario'] . ' MXN</p>';
                echo '<p>Cantidad: ' . $item['cantidad'] . '</p>';
                echo '</li>';
            }
            echo '</ul>';
            echo '<p>Total de artículos: ' . getCartTotalQuantity() . '</p>';
            echo '<form action="cart_checkout.php" method="post" style="display:inline;">';
            echo '<button type="submit" class="btn_comprar">Comprar</button>';
            echo '</form>';
            echo '<form action="cart_empty.php" method="post" style="display:inline;">';
            echo '<button type="submit" class="btn_vaciar">Vaciar Carrito</button>';
            echo '</form>';
        }
        ?>
    </div>
    <a href="/store/bebidas.php">Volver a la tienda</a>
</body>
</html>
