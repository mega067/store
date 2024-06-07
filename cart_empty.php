<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vaciar el carrito
$_SESSION['cart'] = [];

header('Location: /store/cart_view.php');
exit;
?>
