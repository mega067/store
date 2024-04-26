<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Carrito de compras</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Carrito de compras</h1>

  <?php
  session_start(); // Iniciar sesión

  // Obtener el carrito de la sesión
  $carrito = obtenerCarrito();

  if (empty($carrito)) {
    echo "<p>El carrito está vacío.</p>";
  } else {
    echo "<table>";
    echo "<tr><th>Código</th><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th></tr>";

    $total = 0;
    foreach ($carrito as $producto) {
      // Obtener información del producto
      $consulta = "SELECT * FROM bebidas WHERE codigo_de_barras = '" . $producto['codigo'] . "'";
      $resultado = $conexion->query($consulta);

      if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nombreProducto = $fila['nombre_del_producto'];
        $precioUnitario = $fila['precio_unitario'];

        // Calcular subtotal
        $subtotal = $producto['cantidad'] * $precioUnitario;
        $total += $subtotal;

        echo "<tr>";
        echo "<td>" . $producto['codigo'] . "</td>";
        echo "<td>" . $nombreProducto . "</td>";
        echo "<td>" . $producto['cantidad'] . "</td>";
        echo "<td>$" . $precioUnitario . " MXN</td>";
        echo "<td>$" . $subtotal . " MXN</td>";
        echo "</tr>";
      }
    }

    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td>Total:</td>";
    echo "<td>$" . $total . " MXN</td>";
    echo "</tr>";

    echo "</table>";

    echo "<br>";

    echo "<a href='eliminar_producto.php'>Eliminar producto del carrito</a>";
    echo "<a href='procesar_compra.php'>Procesar compra</a>";
  }
  ?>

<?php
function obtenerCarrito() {
  if (isset($_SESSION['carrito'])) {
    return $_SESSION['carrito'];
  } else {
    return array();
  }
}
?>

  

</body>
</html>
