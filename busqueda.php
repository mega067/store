<?php
// Verificar si se ha proporcionado un término de búsqueda
if (isset($_GET['q'])) {
    $busqueda = $_GET['q'];

    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Consulta SQL para buscar tablas que coincidan con el término de búsqueda
    $consulta = "SHOW TABLES LIKE '%$busqueda%'";
    $resultado = $conexion->query($consulta);

    // Iniciar el contenedor de tablas
    echo '<div class="flex_tb">';

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_row()) {
            $nombre_tabla = $fila[0];
            // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
            $ruta_imagen = "tablas_img/" . $nombre_tabla . ".png";
            // Mostrar la imagen y el nombre de la tabla como enlaces
            echo '<div class="tabla_tb">';
            echo '<a href="' . $nombre_tabla . '.php">';
            echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_tabla . '">';
            echo '<h2 class="name_tb">' . $nombre_tabla . '</h2>';
            //aqui se mostrara la coincidencia en el nombre del preoducto que esta dentro de la tabla en la columna nombre
            echo '</a>';
            echo '</div>';
        }
    } else {
        echo '<div class="div_error">';
        echo'<img src="iconos/error.png" class="error_img" title="error">';
        echo '<h2 class="error_ms">No se encontraron tipos de productos que coincidan con la búsqueda: ' . $busqueda .'</h2>';
        echo'</div>';
    }

    // Cerrar el contenedor de tablas
    echo '</div>';

    // Liberar el resultado y cerrar la conexión a la base de datos
    $resultado->close();
    $conexion->close();
} else {
    echo "Por favor, proporcione un término de búsqueda.";
}
?>