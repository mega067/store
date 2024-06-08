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
    $tipo_producto = $item['tipo_producto'];  // Nuevo campo para el tipo de producto

    // Determinar la tabla correspondiente
    switch ($tipo_producto) {
        case 'bebidas':
            $tabla = 'bebidas';
            $campo_unidades = 'unidades_producto';
            break;
        case 'galletas':
            $tabla = 'galletas';
            $campo_unidades = 'cantidad_disponible';
            break;
        case 'lacteos':
            $tabla = 'lacteos';
            $campo_unidades = 'Unidades';
            break;
        case 'prod_limpieza':
            $tabla = 'prod_limpieza';
            $campo_unidades = 'unidades';
            break;
        // Agregar más casos según sea necesario
        default:
            echo "Error: Tipo de producto desconocido.";
            exit;
    }

    // Obtener las unidades actuales del producto
    $consulta = "SELECT $campo_unidades FROM $tabla WHERE codigo_de_barras = '$codigo_de_barras'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $unidades_actuales = $fila[$campo_unidades];

        // Calcular las nuevas unidades
        $nuevas_unidades = $unidades_actuales - $cantidad_comprada;

        // Actualizar las unidades en la base de datos
        $consulta_actualizacion = "UPDATE $tabla SET $campo_unidades = '$nuevas_unidades' WHERE codigo_de_barras = '$codigo_de_barras'";
        
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
