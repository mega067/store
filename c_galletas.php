<?php
include 'conexion.php';

// Consulta SQL para obtener las galletas
$consulta = "SELECT * FROM galletas";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de productos en la fila actual
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_barras"];
        $nombre_producto = $fila["nombre_del_producto"];
        $precio_unitario = $fila["precio_unitario"];
        $unidades = $fila["cantidad_disponible"];
        $unidades_pz = $fila["cantidad_pz"];
        $marca = $fila["marca"];
        $etiqueta = $fila["Etiqueta_de_Salud"];
        $sabor = $fila["Sabor"];
        $ruta_imagen = "galletas_img/" . $nombre_producto . ".png";

        echo '<div class="tabla" class="flex">';

        echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
        echo '<p>' . $nombre_producto . '</p>';
        echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';
        
        echo '<p class="contenido">Marca: ' . $marca . '</p>';
        echo '<p class="contenido">Etiqueta de salud: ' . $etiqueta . '</p>';
        echo '<p class="contenido">Sabor: ' . $sabor . '</p>';
        echo '<p class="contenido">Unidades: ' . $unidades . '</p>';
        echo '<p class="contenido">Contenido: ' . $unidades_pz . '</p>';

        // Formulario para agregar al carrito
        echo '<form action="cart_add.php" method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<input type="hidden" name="nombre_producto" value="' . $nombre_producto . '">';
        echo '<input type="hidden" name="precio_unitario" value="' . $precio_unitario . '">';
        echo '<input type="hidden" name="ruta_imagen" value="' . $ruta_imagen . '">';
        echo '<input type="hidden" name="tipo_producto" value="galletas">';  // Nuevo campo para el tipo de producto
        echo '<label for="unidades_a_comprar">Unidades a comprar:</label>';
        echo '<input type="number" id="unidades_a_comprar" name="unidades_a_comprar" min="1" max="' . $unidades . '" required>';
        echo '<button type="submit" class="btn_comprar">Agregar al carrito</button>';
        echo '</form>';

        echo '</div>';

        $contador++;

        if ($contador == 3) {
            echo '<div class="clearfix"></div>'; // Limpiar la fila actual
            $contador = 0; // Reiniciar el contador
        }
    }
} else {
    echo "No se encontraron galletas en la base de datos.";
}
?>
