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
            <h1 class="titulo_h1" id="WONKA">TIENDA DE ABARROTES</h1>
            <img class="img_wonka" src="iconos/wonka.png">
            <form action="index.php" class="busqueda" method="GET">
                <input type="text" name="q" class="inp_bus" placeholder="Buscar..." />
                <button type="submit" class="btn_bus">
                    <img class="img_btn" src="iconos/buscar.png" alt="">
                </button>
            </form>
            <div class="cart">
                <a href="cart_view.php">
                    <img class="car_img" src="iconos/cart.png" alt="Carrito">
                    <?php
                    include 'cart.php';
                    echo '<span class="cart-quantity"><p class="p_cantidad">productos: ' . getCartTotalQuantity() . '</p></span>';
                    ?>
                </a>
            </div>
        </div>
    </div>
</head>

<body>
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
<img class="fon" src="iconos/wonka_b.png">
    <div class="flex_tb">
        <?php 
        if(isset($_GET['q'])) {
            if(isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'producto') {
                include 'busqueda_produc.php';
            } else {
                include 'busqueda_produc.php';
            }
        } else {
            include 'tablas.php';
        }
        ?>
    </div>
    <script src="script.js"></script>
    <footer class="pie">
        <a href="https://github.com/mega067/store">
            <img class="git" src="iconos/github.png" alt="git">
            <p>github</p>
        </a>
        <p>© 2024 Tienda de abarrotes Angel Y Michelle. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
