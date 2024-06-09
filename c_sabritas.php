<?php
include 'conexion.php';

// Consulta SQL para obtener las bebidas
$consulta = "SELECT * FROM sabritas";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de productos en la fila actual
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_de_barras"];
        $nombre_producto = $fila["nombre_del_producto"];
        $precio_unitario = $fila["precio"];
        $unidades = $fila["unidad"];
        $marca = $fila["marca"];
        $sabor = $fila["sabor"];
        $etiqueta = $fila["etiqueta_de_Salud"];
        $contenido = $fila["contenido_gr_net"]; // Obtener el contenido del producto
        $ruta_imagen = "sabritas_img/" . $nombre_producto . ".png";

        echo '<div class="tabla" class="flex">';

        echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
        echo '<p>' . $nombre_producto . '</p>';
        echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';
        echo '<p>Marca: ' . $marca . ' </p>';

        echo '<p class="contenido">contenido:  ' . $contenido . '</p>'; // Mostrar el contenido en un párrafo
        echo '<p class="contenido">etiquetas de salud: ' . $etiqueta . '</p>'; // Mostrar el contenido en un párrafo
        echo '<p class="contenido">Unidades: ' . $unidades . '</p>'; // Mostrar el contenido en un párrafo
        echo '<p class="contenido">Sabor: ' . $sabor . '</p>'; // Mostrar el contenido en un párrafo


        // Formulario para agregar al carrito
        echo '<form action="cart_add.php" method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<input type="hidden" name="nombre_producto" value="' . $nombre_producto . '">';
        echo '<input type="hidden" name="precio_unitario" value="' . $precio_unitario . '">';
        echo '<input type="hidden" name="ruta_imagen" value="' . $ruta_imagen . '">';
        echo '<input type="hidden" name="tipo_producto" value="sabritas">';  // Nuevo campo para el tipo de producto
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
    echo "No se encontraron bebidas en la base de datos.";
}
?>
