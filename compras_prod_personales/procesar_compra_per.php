<?php
include 'conexion.php'; // Contiene los datos de conexión a la base de datos

// Obtener los datos del formulario
$codigo_de_barras = $_POST['codigo_de_barras'];
$unidades_a_comprar = $_POST['unidades_a_comprar'];

// Validar la entrada del usuario
if (!is_numeric($unidades_a_comprar) || $unidades_a_comprar <= 0) {
    echo "Error: La cantidad de unidades debe ser un número entero positivo.";
    exit;
}

// Obtener las unidades actuales del producto
$consulta = "SELECT unidades FROM prod_personales WHERE codigo_barras = '$codigo_de_barras'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    $unidades_actuales = $fila['unidades'];
} else {
    echo "Error: No se encontró el producto en la base de datos.";
    exit;
}

// Calcular las nuevas unidades
$nuevas_unidades = $unidades_actuales - $unidades_a_comprar;

// Actualizar las unidades en la base de datos
$consulta = "UPDATE prod_personales SET unidades = '$nuevas_unidades' WHERE codigo_barras = '$codigo_de_barras'";

if ($conexion->query($consulta) === TRUE) {
    echo "Inventario actualizado correctamente.";
} else {
    echo "Error: No se pudo actualizar el inventario. " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
header('Location: /store/prod_personales.php');
exit;
