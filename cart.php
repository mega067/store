<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($codigo_de_barras, $nombre_producto, $precio_unitario, $cantidad, $ruta_imagen, $tipo_producto) {
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['codigo_de_barras'] == $codigo_de_barras) {
            $item['cantidad'] += $cantidad;
            return;
        }
    }
    $_SESSION['cart'][] = [
        'codigo_de_barras' => $codigo_de_barras,
        'nombre_producto' => $nombre_producto,
        'precio_unitario' => $precio_unitario,
        'cantidad' => $cantidad,
        'ruta_imagen' => $ruta_imagen,
        'tipo_producto' => $tipo_producto  // Nuevo campo para el tipo de producto
    ];
}

function getCartTotalQuantity() {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['cantidad'];
    }
    return $total;
}
?>
