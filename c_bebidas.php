<?php
include 'conexion.php';

// Consulta SQL para obtener las bebidas
$consulta = "SELECT * FROM bebidas";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de productos en la fila actual
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_de_barras"];
        $nombre_producto = $fila["nombre_del_producto"];
        $precio_unitario = $fila["precio_unitario"];
        $contenido = $fila["contenido"]; // Obtener el contenido del producto
        // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
        $ruta_imagen = "bebidas_img/" . $nombre_producto . ".png";

        echo '<div class="producto">';
            echo '<a href="' . $nombre_producto . '.php">';
                echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
                echo '<p>' . $nombre_producto . '</p>';
                echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';
                echo '<p class="contenido">' . $contenido . '</p>'; // Mostrar el contenido en un párrafo
            echo '</a>';

            echo '<button class="btn_agregar_carrito" type="button" onclick="comprarProducto(\'' . $nombre_producto . '\')"><img class="comprar" src="iconos/comprar.png"></button>'; // Botón con función JavaScript
        echo '</div>';

        $contador++;

        if ($contador == 3) {
            echo '<div class="clearfix"></div>'; // Limpiar la fila actual
            $contador = 0; // Reiniciar el contador
        }
    }
} else {
    echo "No se encontraron bebidas en la base de datos.";
}
?>

<script>
function comprarProducto(codigoDeBarras) {
    window.location.href = codigoDeBarras + '.php?comprar=true'; // Redireccionar a la página del producto con parámetro "comprar=true"
}
</script>
