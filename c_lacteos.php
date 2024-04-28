<?php
include 'conexion.php';

// Consulta SQL para obtener las bebidas
$consulta = "SELECT * FROM lacteos";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de productos en la fila actual
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_barras"];
        $nombre_producto = $fila["nombre_producto"];
        $precio_unitario = $fila["precio"];
        $unidades = $fila["Unidades"];
        $marca = $fila["marca"]; // Obtener el contenido del producto
        
        $ruta_imagen = "bebidas_img/" . $nombre_producto . ".png";

        echo '<div class="tabla" class="flex">';

        echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
        echo '<p>' . $nombre_producto . '</p>';
        echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';

        echo '<p class="contenido">Marca:  ' . $marca . '</p>'; // Mostrar el contenido en un párrafo
        
        echo '<p class="contenido">Unidades: ' . $unidades . '</p>'; // Mostrar el contenido en un párrafo

        // Formulario para rellenar inventario
        echo '<form action="
        compras_lacteos/actualizar_inventario_lacteos.php" 
        method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<label for="unidades_a_agregar">Unidades a agregar:</label>';
        echo '<input type="number" id="unidades_a_agregar" name="unidades_a_agregar" required>';
        echo '<button type="submit" class="btn_rellenar">Rellenar inventario</button>';
        echo '</form>';

        // Formulario para comprar
        echo '<div>';
        echo '<form action=
        "compras_lacteos/procesar_compra_lacteos.php" 
        method="post">';
        echo '<input type="hidden" name="codigo_de_barras" value="' . $codigo_de_barras . '">';
        echo '<label for="unidades_a_comprar" class=unidades >Unidades a comprar:                 </label>';
        echo '</div>';

        echo '<input type="number" id="unidades_a_comprar" name="unidades_a_comprar" min="1" max="' . $unidades . '" required>';
        echo '<button type="submit" class="btn_comprar">Comprar</button>';
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