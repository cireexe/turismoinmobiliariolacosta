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
                <input type="radio" name="slides" checked="checked" id="slide-1">
                <input type="radio" name="slides" id="slide-2">
                <input type="radio" name="slides" id="slide-3">
                <input type="radio" name="slides" id="slide-4">
                <input type="radio" name="slides" id="slide-5">
                <input type="radio" name="slides" id="slide-6">

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

                    
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="../img/sanclemente/mundomarino.jpg" alt="">
                            </div>
                            <figcaption>
                                                       
                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="../img/sanclemente/termasmarinas.jpg" alt="">
                            </div>
                            <figcaption>
                               
                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="../img/sanclemente/puntarasa.jpg" alt="">
                            </div>
                            <figcaption>

                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="../img/sanclemente/puertosanclemenete.jpg" alt="">
                            </div>
                            <figcaption>
                                                  
                            </figcaption>
                        </figure>
                    </li>
                    <li class="carousel__slide">
                        <figure>
                            <div>
                                <img src="../img/sanclemente/muellesanclemente.jpg" alt="">
                            </div>
                            <figcaption>
                                	
                                
                            </figcaption>
                        </figure>
                    </li>
                </ul>    
                <ul class="carousel__thumbnails">
                    <li>
                        <label for="slide-1"><img src="../img/sanclementecartel.jpg" alt=""></label>
                    </li>
                    <li>
                        <label for="slide-2"><img src="../img/sanclemente/mundomarino.jpg" alt=""></label>
                    </li>
                    <li>
                        <label for="slide-3"><img src="../img/sanclemente/termasmarinas.jpg" alt=""></label>
                    </li>
                    <li>
                        <label for="slide-4"><img src="../img/sanclemente/puntarasa.jpg" alt=""></label>
                    </li>
                    <li>
                        <label for="slide-5"><img src="../img/sanclemente/puertosanclemenete.jpg" alt=""></label>
                    </li>
                    <li>
                        <label for="slide-6"><img src="../img/sanclemente/muellesanclemente.jpg" alt=""></label>
                    </li>
                </ul>
            </div>
        </div>

</body>
</html>