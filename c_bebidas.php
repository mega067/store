<?php
include 'conexion.php';

// Consulta SQL para obtener las bebidas
$consulta = "SELECT * FROM bebidas";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $contador = 0; // Contador para llevar la cuenta del número de productos en la fila actual
    while ($fila = $resultado->fetch_assoc()) {
        $codigo_de_barras = $fila["codigo_de_barras"];
        $nombre_producto = $fila["nombre_del_producto"];
        $precio_unitario = $fila["precio_unitario"];
        $unidades = $fila["unidades_producto"];
        $contenido = $fila["contenido"]; // Obtener el contenido del producto
        // Generar la ruta de la imagen (suponiendo que las imágenes están en la misma carpeta)
        $ruta_imagen = "bebidas_img/" . $nombre_producto . ".png";
      
        echo '<div class="tabla" class="flex" >';
            
                echo '<img class="tabla_img" src="' . $ruta_imagen . '" alt="' . $nombre_producto . '">';
                echo '<p>' . $nombre_producto . '</p>';
                echo '<p>Precio: $' . $precio_unitario . ' MXN</p>';
                
                echo '<p class="contenido">' . $contenido . '</p>'; // Mostrar el contenido en un párrafo
                echo '<p class="contenido">Unidades: '  . $unidades . '</p>'; // Mostrar el contenido en un párrafo
            
            echo '<button class="btn_rellenar" type="button" ><img class="comprar" src="iconos/comprar.png"></button>'; 
            echo '<button class="btn_comprar" type="button" ><img class="comprar" src="iconos/comprar.png"></button>'; 

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

<script>
function comprarProducto(codigoDeBarras) {
    window.location.href = codigoDeBarras + '.php?comprar=true'; // Redireccionar a la página del producto con parámetro "comprar=true"
}
</script>
<script>
function agregarProductoAlCarrito(codigoDeBarras) {
  // Implement the function to add the product to the cart
  console.log("Agregando producto al carrito: " + codigoDeBarras); // Replace with actual logic
}
</script>
