<?php
include 'conexion.php';

// Consulta SQL para obtener los nombres de las tablas
$consulta = "SHOW TABLES";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_row()) {
        $nombre_tabla = $fila[0];
        // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
        $ruta_imagen = $nombre_tabla . ".png";
        // Mostrar la imagen y el nombre de la tabla como enlaces
        echo '<div class="tabla">';
        echo '<a href="' . $nombre_tabla . '.php">';
        echo '<img src="' . $ruta_imagen . '" alt="' . $nombre_tabla . '">';
        echo '<p>' . $nombre_tabla . '</p>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "No se encontraron tablas en la base de datos.";
}
?>
