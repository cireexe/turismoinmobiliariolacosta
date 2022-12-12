<?php
include_once("validar.php");
if(isset($_GET['id'])) {
    $sql = "DELETE FROM comercios where id = " . $_GET['id'];
    mysqli_query($conexion, $sql);
}

header("Location: index.php");
