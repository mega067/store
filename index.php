<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tienda</title>
  <link rel="stylesheet" type="text/css" href="style.css"> <!-- Enlace al archivo CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.4/masonry.min.css">

</head>
<body>
  <div class="titu" >
   <div class="flex_logo" >
    <img class="logo_img" src="iconos/logo.png" title="logo">
    <h1 class="titulo_h1">Tienda de abarrotes </h1>
    <!-- agrega aqui el boton de buscar -->
    </div>
  </div>
  <div class="carrito"></div>
  
  <div class="flex_tb">
    <!-- Incluir el archivo PHP que muestra las tablas -->
    <?php include 'tablas.php'; ?>
    
  </div>
  </div>

</div>
  
  <footer class="pie">
  <a href="https://github.com/mega067/store">
  <img class="git"src="iconos/github.png" alt="git" >
  <p>github</p>
  </a>
    <p>© 2024 Tienda de abarrotes Angel Y Michelle. Todos los derechos reservados.</p>
  </footer>

</body>
</html>
