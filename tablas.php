<?php
include 'conexion.php';

// Consulta SQL para obtener los nombres de las tablas
$consulta = "SHOW TABLES";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de tablas en la fila actual
    while ($fila = $resultado->fetch_row()) {
        $nombre_tabla = $fila[0];
        // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
        $ruta_imagen = "tablas_img/". $nombre_tabla . ".png";
        // Mostrar la imagen y el nombre de la tabla como enlaces
        
        echo '<div class="tabla_tb">';
        echo '<a href="' . $nombre_tabla . '.php">';
        echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_tabla . '">';
        echo '<h2 class="name_tb">' . $nombre_tabla . '</h2>';
        echo '</a>';
        echo '</div>';
        

        // Incrementar el contador
        $contador++;

        // Si el contador es igual a 3, cerrar la fila y comenzar una nueva
        if ($contador == 3) {
            echo '<div class="clearfix"></div>'; // Limpiar la fila actual
            $contador = 0; // Reiniciar el contador
        }
    }
} else {
    echo "No se encontraron tablas en la base de datos.";
}
?>
