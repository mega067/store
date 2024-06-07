<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'cart.php';

$codigo_de_barras = $_POST['codigo_de_barras'];
$nombre_producto = $_POST['nombre_producto'];
$precio_unitario = $_POST['precio_unitario'];
$unidades_a_comprar = $_POST['unidades_a_comprar'];
$ruta_imagen = $_POST['ruta_imagen'];

addToCart($codigo_de_barras, $nombre_producto, $precio_unitario, $unidades_a_comprar, $ruta_imagen);

header('Location: /store/bebidas.php');
exit;
?>
