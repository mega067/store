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
$tipo_producto = $_POST['tipo_producto'];  // Nuevo campo para el tipo de producto

addToCart($codigo_de_barras, $nombre_producto, $precio_unitario, $unidades_a_comprar, $ruta_imagen, $tipo_producto);

// Redirigir según el tipo de producto
header('Location: /store/' . $tipo_producto . '.php');
exit;
?>
