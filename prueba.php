<?php
include_once("conexion.php");
if(isset($_GET['id'])) {
    $sql = "SELECT * FROM comercios where id = " . $_GET['id'];
    $comercio = mysqli_query($conexion, $sql);
    $titulo = 'Comercios';
    $comercio = $comercio->fetch_assoc();
    // En la variable $comercio estan todos los datos por ejemplo nombre sería: $comercio['nombre']
    // print_r($comercio);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?></title>
    <link rel="stylesheet" href="css/css.prueba.css">
</head>
<body>
    
<h3>hola</h3>

<section class="gallery">
  <div class="gallery__item">
    <input
      type="radio"
      id="img-1"
      checked
      name="gallery"
      class="gallery__selector"
    />
    <img
      class="gallery__img"
      src="https://i.picsum.photos/id/1015/600/400.jpg"
      alt=""
    />
    <label for="img-1" class="gallery__thumb">
      <img src="https://i.picsum.photos/id/1015/150/100.jpg" alt="" />
    </label>
  </div>
</section>

</body>
</html>