<?php 
session_start();
include("conexion.php");
// print_r($_POST);die;

if(isset($_POST['user']) && isset($_POST['pass'])) {
    $sql = "select * from usuarios where user = '" . $_POST['user'] . "' and pass = '" . $_POST['pass'] . "'";
    $query = mysqli_query($conexion, $sql);
    // print_r($query);die;
    if($query->num_rows > 0) {
    //  echo "hay coincidencias";
        $_SESSION['logueado'] = true;
        header("Location: index.php");
    } else {
        header("Location: index.php");
        // echo "no hay";
     }
 } else if(isset($_SESSION['logueado']) && $_SESSION['logueado']) {
    //  print_r($_SERVER['REQUEST_URI']);
    if(strpos($_SERVER['REQUEST_URI'], 'validar.php') || strpos($_SERVER['REQUEST_URI'], 'index.php') || !strpos($_SERVER['REQUEST_URI'], '.php')) {
        header("Location: formulario_agrega_edita.php");
    }
 }
else if(!strpos($_SERVER['REQUEST_URI'], 'index.php') || !strpos($_SERVER['REQUEST_URI'], '.php')) {
    // print_r($_SERVER['REQUEST_URI']);

    header("Location: index.php");
    //  echo "nada";
}
?>