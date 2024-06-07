<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'conexion.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "El carrito está vacío.";
    exit;
}

foreach ($_SESSION['cart'] as $item) {
    $codigo_de_barras = $item['codigo_de_barras'];
    $cantidad_comprada = $item['cantidad'];

    // Obtener las unidades actuales del producto
    $consulta = "SELECT unidades_producto FROM bebidas WHERE codigo_de_barras = '$codigo_de_barras'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $unidades_actuales = $fila['unidades_producto'];

        // Calcular las nuevas unidades
        $nuevas_unidades = $unidades_actuales - $cantidad_comprada;

        // Actualizar las unidades en la base de datos
        $consulta_actualizacion = "UPDATE bebidas SET unidades_producto = '$nuevas_unidades' WHERE codigo_de_barras = '$codigo_de_barras'";
        
        if ($conexion->query($consulta_actualizacion) !== TRUE) {
            echo "Error: No se pudo actualizar el inventario para el producto con código de barras $codigo_de_barras. " . $conexion->error;
        }
    } else {
        echo "Error: No se encontró el producto con código de barras $codigo_de_barras en la base de datos.";
    }
}

// Vaciar el carrito después de la compra
$_SESSION['cart'] = [];

echo "Compra realizada con éxito.";
header('Location: /store/cart_view.php');
exit;
?>
