<?php
session_start(); // Iniciar sesión

// Revisar si el producto ya está en el carrito
$carrito = obtenerCarrito();
if (isset($carrito[$codigoDeBarras])) {
  $carrito[$codigoDeBarras]['cantidad']++; // Si ya existe, aumentar cantidad
} else {
  // Si no existe, agregar el producto con cantidad 1
  $carrito[$codigoDeBarras] = array(
    'codigo' => $codigoDeBarras,
    'cantidad' => 1
  );
}

// Actualizar el carrito en la sesión
guardarCarrito($carrito);

// Redireccionar a la página actual (bebidas.php)
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

<?php
function obtenerCarrito() {
  if (isset($_SESSION['carrito'])) {
    return $_SESSION['carrito'];
  } else {
    return array();
  }
}

function guardarCarrito($carrito) {
  $_SESSION['carrito'] = $carrito;
}
?>
