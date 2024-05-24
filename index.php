<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  
  <title>Tienda</title>
  <link rel="stylesheet" type="text/css" href="style.css"> <!-- Enlace al archivo CSS -->
 
  <div class="titu">
    <div class="flex_logo">
    <div class="logo_div"  >
      <a href="/store"class="icono_href">
      <img class="logo_img" src="iconos/logo.png" title="logo">
      </a>
    </div>
    
      <h1 class="titulo_h1">TIENDA DE ABARROTES</h1>

      <!-- Botón de búsqueda -->
      
      <form action="index.php" class="busqueda" method="GET">
      
  <input type="text" name="q" class="inp_bus" placeholder="Buscar..." />
  <button type="submit" class="btn_bus"><img class="img_btn" src="iconos/buscar.png" alt=""></button>
</form>


      
    </div>
  </div>
</head>
<body>
  

  
  <div class="flex_tb">
  <?php 
  // Verifica si hay un término de búsqueda
  if(isset($_GET['q'])) {
    // Verifica el tipo de búsqueda seleccionado
    if(isset($_GET['tipo_busqueda']) && $_GET['tipo_busqueda'] == 'producto') {
      include 'busqueda_produc.php'; // Si se selecciona la búsqueda de producto, incluye el archivo de búsqueda correspondiente
    } else {
      include 'busqueda_produc.php'; //esto se cancelo no fue mi mejor idea
    }
  } else {
    include 'tablas.php'; //desde que se cancelo ya no funciona 
    
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
