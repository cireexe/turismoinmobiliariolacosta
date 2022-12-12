<?php
include_once("conexion.php");
$categorias = mysqli_query($conexion, "SELECT * FROM categorias"); 
$categorias = $categorias->fetch_all(MYSQLI_ASSOC);

// print_r($categorias);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Turismo La Costa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/templatemo-main.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <!--imagenes menu-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">


        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
            @media (max-width: 900px) {
                .titulo {
                    font-size: 40px !important;   
                }
            }
        </style>
        
    </head>

        <body>

            <div class="fixed-side-navbar">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="#home"><span>Inicio</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#services"><span>Menu</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#our-story"><span>Mapa y contactos</span></a></li>
                </ul>
            </div>

            <div class="parallax-content baner-content" id="home">
                <div class="container">
                    <div class="first-content">
                        <h1 class='titulo'>Turismo</h1>
                        <h3 class='titulo'>inmobiliario</h3>
                        <span><em>La Costa</em></span>
                        <div class="primary-button">
                            <a href="#services">VER MAS</a>
                        </div>
                    </div>
                </div>
            </div>


    <div class="service-content" id="services">
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="card">
                      <div class="imgBx">
                          <img src="img/turismo.jpg" alt="images">
                      </div>
                      <div class="details">
                          <h2>Turismo<br><a href="turismo.html">Ver</a></h2>
                      </div>
                    </div>
                    <div class="card">
                      <div class="imgBx">
                         <img src="img/programas.jpg" alt="images">
                      </div>
  
                      <div class="details">
                          <h2>Programas<br><a href="programas.html">Ver</a></h2>
                       </div>
                    </div>

                  <?php foreach($categorias as $value): ?>
                  
                    <div class="card">
                        <div class="imgBx">
                        <img src="img/<?= str_replace(" ", "", $value['nombre']) ?>.jpg" alt="images">
                        </div>
                        <div class="details">
                        <h2><?= $value['nombre'] ?><br><a href="comercios.php?id_categoria=<?= $value['id'] ?>">Ver</a></h2>
                        </div>
                    </div>
                  <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>

    <!-- <div class="parallax-content projects-content" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="owl-testimonials" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/1st-big-item.jpg" data-lightbox="image-1"><img src="img/1st-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Awesome Note Book</h4>
                                    <span>$18.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/2nd-big-item.jpg" data-lightbox="image-1"><img src="img/2nd-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Antique Decoration Photo</h4>
                                    <span>$27.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/3rd-big-item.jpg" data-lightbox="image-1"><img src="img/3rd-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Work Hand Bag</h4>
                                    <span>$36.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/4th-big-item.jpg" data-lightbox="image-1"><img src="img/4th-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Smart Watch</h4>
                                    <span>$45.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/5th-big-item.jpg" data-lightbox="image-1"><img src="img/5th-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>PC Tablet Draw</h4>
                                    <span>$63.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/6th-big-item.jpg" data-lightbox="image-1"><img src="img/6th-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Healthy Milkshake</h4>
                                    <span>$77.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/2nd-big-item.jpg" data-lightbox="image-1"><img src="img/2nd-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Antique Decoration Photo</h4>
                                    <span>$84.50</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonials-item">
                                <a href="img/1st-big-item.jpg" data-lightbox="image-1"><img src="img/1st-item.jpg" alt=""></a>
                                <div class="text-content">
                                    <h4>Awesome Notes Book</h4>
                                    <span>$96.75</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="tabs-content" id="our-story">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="map">
                         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d205024.36973027347!2d-56.69987490191612!3d-36.590124368651374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e0!4m0!4m0!5e0!3m2!1ses-419!2sar!4v1666655170105!5m2!1ses-419!2sar" width="700" height="600" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
                <h1 class="cont">CONTACTOS:<br>2246-503-092<br>2254-546-100</h1>
            </div>
        </div>
    </div>
 <div class="contacto">

 </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a>Redes Sociales</a>
                    </div>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                    <p>Copyright &copy; 2022
            
            		- Design: Cireweb</p>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";  
            }
            document.getElementById(cityName).style.display = "block";  
        }
    </script>

    <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $(".fixed-side-navbar a, .primary-button a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function(){
           
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });
    </script>

</body>
</html>