<?php
include_once("conexion.php");
$categorias = mysqli_query($conexion, "SELECT * FROM categorias"); 
$categorias = $categorias->fetch_all(MYSQLI_ASSOC);
$titulo = 'Comercios';
if(isset($_GET['id_categoria'])) {
  foreach($categorias as $value) {
    if($value['id'] === $_GET['id_categoria']) {
      $titulo = $value['nombre'];
    }
  }
  $sql = "SELECT comercios.id, comercios.nombre, comercios.direccion, comercios.id_localidad, comercios.mail, comercios.telefono, comercios.descripcion, comercios.id_categoria, comercios.imagen, localidades.localidad FROM comercios INNER JOIN localidades on localidades.id = comercios.id_localidad where id_categoria = " . $_GET['id_categoria'];
} else {
  $sql = "SELECT * FROM comercios";
}
$comercios = mysqli_query($conexion, $sql);
// print_r($categorias);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= $titulo ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Noto+Sans+JP&amp;display=swapps://github.com/produle/MockFlowFont/blob/master/MockFlowFont1/dist/MockFlowFont1.woff'>
<link rel='stylesheet' href='https://assets.css-tricks.ir/font/font.css'><link rel="stylesheet" href="dist inmobiliaria/style.css">
<link href="css/comercios.css" rel="stylesheet" />

</head>
<body>

<a href="index.php"><button type="button" class="btn">VOLVER</button></a>


    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="first-content">
                <h1><?= $titulo ?></h1>
            </div>
        </div>
    </div>

<ul class="cards">
<?php while($row = mysqli_fetch_assoc($comercios)): ?>
  <li class='comercio'>
    <a href="comercio.php?id=<?= $row['id'] ?>" class="card">
      <img src="admin/images/<?= $row['imagen'] ?>" class="card__image" alt="" />
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <div class="card__header-text">
            <h3 class="card__title"><?= $row['nombre'] ?></h3>            
            <span class="card__status">
            </span>
          </div>
        </div>
        <p class="card__description">
                                    Nombre: <?php echo $row['nombre'] ?> <br>
                                    Ubicacion: <?php echo $row['direccion'] ?> <br>
                                    Localidad: <?php echo $row['localidad'] ?> <br>
                                    telefono: <?php echo $row['telefono'] ?> <br>
                                    Descripcion: <?php echo $row['descripcion'] ?> <br>
        </p>
      </div>
    </a>      
  </li>
<?php endwhile; ?>

</ul>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
