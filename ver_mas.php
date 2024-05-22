<?php
// Verificar si se han proporcionado los parámetros necesarios
if (isset($_GET['tabla']) && isset($_GET['q'])) {
    $tabla = $_GET['tabla'];
    $busqueda = $_GET['q'];

    // Incluir el archivo de conexión a la base de datos
    include 'conexion.php';

    // Consulta SQL para obtener todas las coincidencias en la tabla específica
    $consulta_coincidencias = "SELECT nombre_del_producto FROM $tabla WHERE nombre_del_producto LIKE '%$busqueda%'";
    $resultado_coincidencias = $conexion->query($consulta_coincidencias);

    // Mostrar coincidencias si se encontraron
    if ($resultado_coincidencias->num_rows > 0) {
        echo '<h2>Coincidencias en ' . $tabla . '</h2>';
        echo '<ul>';
        while ($fila_coincidencias = $resultado_coincidencias->fetch_assoc()) {
            echo '<li>' . $fila_coincidencias['nombre_del_producto'] . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No se encontraron coincidencias en ' . $tabla . '</p>';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "Parámetros incorrectos.";
}
?>
