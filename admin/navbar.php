<!-- Navigation-->
<?php 
$sql = "SELECT * FROM categorias";
$categorias = mysqli_query($conexion, $sql);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" >Administrador</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse flex-wrap" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="formulario_agrega_edita.php">Agregar</a></li>
            </ul>
            <?php while($row = mysqli_fetch_assoc($categorias)): ?>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="comercios.php?id_categoria=<?= $row['id'] ?>"><?= ucwords(strtolower($row['nombre'])) ?></a></li>
            </ul>
            <?php endwhile; ?>                    
                <a href="cerrarsesion.php">
                    Salir
                </a>
        </div>
    </div>
</nav>