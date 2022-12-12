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
    <link rel="stylesheet" href="carousel/vistas.css">
</head>
<body>
    
    
    <div class="parallax-content baner-content" id="home">
        <div class="container">
            <div class="first-content">
                <h3> <?php echo $comercio['nombre'] ?> <br></h3>
            </div>
        </div>
    </div>

 
        <div class="container">
            <div class="carousel">
                <input type="radio" name="slides" id="slide-1">
     
                <ul class="carousel__slides">
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="admin/images/<?= $comercio['imagen'] ?>" alt="">
                            </div>
                            <figcaption>
                            
                                    Ubicacion: <?php echo $comercio['direccion'] ?> <br>
                                    Localidad: <?php echo $comercio['id_localidad'] ?> <br>
                                    telefono: <?php echo $comercio['telefono'] ?> <br>
                                    Descripcion: <?php echo $comercio['descripcion'] ?> <br>
        
                                   </figcaption>
                        </figure>
                    </li>
                </ul>    
                <ul class="carousel__thumbnails">
                <?php 
                foreach(json_decode($comercio['imagenes']) as $key => $value):
                ?>
                <div class="carousel__slide">
                    <label for="slide-1"><img src="admin/images/<?= $value ?>" alt=""></label>

                </div>
                <?php 
                endforeach;
                ?>
                </ul>
            </div>
        </div>

</body>
</html>

</body>
</html>