<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  
  <title>Tienda</title>
  <link rel="stylesheet" type="text/css" href="style.css"> <!-- Enlace al archivo CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.4/masonry.min.css">
</head>
<body>
  <div class="titu">
    <div class="flex_logo">
      <img class="logo_img" src="iconos/logo.png" title="logo">
      <h1 class="titulo_h1">Tienda de abarrotes</h1>
      <!-- Botón de búsqueda -->
      
      <form action="index.php" class="busqueda"  method="GET"> <!-- Redirige la búsqueda a la misma página -->
        <input type="text" name="q" class="inp_bus" placeholder="Buscar..." />
        <button type="submit" class="btn_bus" > <img class="img_btn" src="iconos/buscar.png" alt=""> </button>
      </form>
      
    </div>
  </div>
  
  <div class="flex_tb">
    <!-- Incluir el archivo PHP que muestra las tablas -->
    <?php 
      if(isset($_GET['q'])) {
        include 'busqueda.php'; // Si hay un término de búsqueda, incluye el archivo de búsqueda
      } else {
        include 'tablas.php'; // Si no hay búsqueda, incluye el archivo de las tablas
      }
    ?>
  </div>

  <footer class="pie">
    <a href="https://github.com/mega067/store">
      <img class="git" src="iconos/github.png" alt="git">
      <p>github</p>
    </a>
    <p>© 2024 Tienda de abarrotes Angel Y Michelle. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
