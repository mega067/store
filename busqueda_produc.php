<?php
// Verificar si se ha proporcionado un término de búsqueda
if (isset($_GET['q'])) {
    $busqueda = $_GET['q'];

    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Consulta SQL para obtener todos los nombres de las tablas en la base de datos
    $consulta_tablas = "SHOW TABLES";
    $resultado_tablas = $conexion->query($consulta_tablas);

    // Iniciar el contenedor de tablas
    echo '<div class="flex_tb">';

    // Variable para verificar si se encontraron resultados
    $resultados_encontrados = false;

    // Verificar si se encontraron resultados
    if ($resultado_tablas->num_rows > 0) {
        while ($fila_tablas = $resultado_tablas->fetch_row()) {
            $nombre_tabla = $fila_tablas[0];

            // Consulta SQL para buscar coincidencias en el nombre del producto dentro de la tabla actual
            $consulta_coincidencias = "SELECT nombre_del_producto FROM $nombre_tabla WHERE nombre_del_producto LIKE '%$busqueda%'";
            $resultado_coincidencias = $conexion->query($consulta_coincidencias);

            // Mostrar coincidencias si se encontraron
            if ($resultado_coincidencias->num_rows > 0) {
                $resultados_encontrados = true;
                // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
                $ruta_imagen = "tablas_img/" . $nombre_tabla . ".png";
                // Mostrar la imagen y el nombre de la tabla como enlaces
                echo '<div class="tabla_tb">';
                echo '<a href="' . $nombre_tabla . '.php">';
                echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_tabla . '">';
                echo '<h2 class="name_tb">' . $nombre_tabla . '</h2>';
                echo '<div class="coincidencias">';
                while ($fila_coincidencias = $resultado_coincidencias->fetch_assoc()) {
                    echo '';
                    echo '<li><h2 class="coincidencia">'. $fila_coincidencias['nombre_del_producto'] . '</li></h2>';
                }

                echo '</ul>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
    }

    // Si no se encontraron resultados
    if (!$resultados_encontrados) {
        echo '<div class="div_error">';
        echo '<img src="iconos/error.png" class="error_img" title="error">';
        echo '<h2 class="error_ms">No se encontraron tipos de productos que coincidan con la búsqueda: ' . $busqueda .'</h2>';
        echo '</div>';
    }

    // Cerrar el contenedor de tablas
    echo '</div>';

    // Liberar resultados y cerrar la conexión a la base de datos
    $resultado_tablas->close();
    $conexion->close();
} else {
    echo "Por favor, proporcione un término de búsqueda.";
}
?>
