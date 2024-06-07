<?php
include 'conexion.php';
include 'cart.php';

// Consulta SQL para obtener las bebidas
$consulta = "SELECT * FROM bebidas";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0;
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_de_barras"];
        $nombre_producto = $fila["nombre_del_producto"];
        $precio_unitario = $fila["precio_unitario"];
        $unidades = $fila["unidades_producto"];
        $ingredientes = $fila["ingredientes"];
        $contenido = $fila["contenido"];
        $ruta_imagen = "bebidas_img/" . $nombre_producto . ".png";

        echo '<div class="tabla" class="flex">';
        echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
        echo '<p>' . $nombre_producto . '</p>';
        echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';
        echo '<p>Ingredientes: ' . $ingredientes . '</p>';
        echo '<p class="contenido">' . $contenido . '</p>';
        echo '<p class="contenido">Unidades: ' . $unidades . '</p>';

        echo '<form action="compras_bebidas/actualizar_inventario_bebidas.php" method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<label for="unidades_a_agregar">Unidades a agregar:</label>';
        echo '<input type="number" id="unidades_a_agregar" name="unidades_a_agregar" required>';
        echo '<button type="submit" class="btn_rellenar">Rellenar inventario</button>';
        echo '</form>';

        echo '<form action="cart_add.php" method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<input type="hidden" name="nombre_producto" value="' . $nombre_producto . '">';
        echo '<input type="hidden" name="precio_unitario" value="' . $precio_unitario . '">';
        echo '<input type="hidden" name="ruta_imagen" value="' . $ruta_imagen . '">';
        echo '<input type="hidden" name="tipo_producto" value="bebidas">';  
        echo '<label for="unidades_a_comprar" class="unidades">Unidades a comprar:</label>';
        echo '<input type="number" id="unidades_a_comprar" name="unidades_a_comprar" min="1" max="' . $unidades . '" required>';
        echo '<button type="submit" class="btn_comprar">Añadir al carrito</button>';
        echo '</form>';

        echo '</div>';

        $contador++;
        if ($contador == 3) {
            echo '<div class="clearfix"></div>';
            $contador = 0;
        }
    }
} else {
    echo "No se encontraron bebidas en la base de datos.";
}
?>

