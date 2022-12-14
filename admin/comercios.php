<?php
include_once("validar.php");
$sql = "SELECT * FROM comercios INNER JOIN localidades on localidades.id = comercios.id_localidad where id_categoria = " . $_GET['id_categoria'];
$respuesta = mysqli_query($conexion, $sql);
// print_r($respuesta);
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("head.php") ?>
    
    <body>
        <?php include_once("navbar.php") ?>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while($row = mysqli_fetch_assoc($respuesta)): ?>
                <?php //print_r($row) ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="images/<?php echo $row['imagen'] ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"></h5>
                                    <!-- Product price-->
                                    Nombre: <?php echo $row['nombre'] ?> <br>
                                    Ubicacion: <?php echo $row['direccion'] ?> <br>
                                    Localidad: <?php echo $row['localidad'] ?> <br>
                                    telefono: <?php echo $row['telefono'] ?> <br>
                                    Descripcion: <?php echo $row['descripcion'] ?> <br>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="formulario_agrega_edita.php?id_comercio=<?php echo $row['id'] ?>">editar</a>
                                <a class="btn btn-outline-dark mt-auto" onclick="eliminar(<?php echo $row['id'] ?>)">eliminar</a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; TurismoInmobiliarioLaCosta</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            const eliminar = (id)=> {
                const confirma = confirm("Desea eliminar el comercio?")
                if(confirma) {
                    location.href = `elimina.php?id=${id}`
                }
            }
        </script>
    </body>
</html>
