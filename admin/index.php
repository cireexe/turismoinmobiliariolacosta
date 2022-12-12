<?php 
include('validar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=StyleSheet href="estilo.css" type="text/css" media=screen>
    <title>Login</title>
</head>
<body>
    <div class="login">
        <form class="form-login" action="validar.php" method="post">
            <ul>
            <h5>INICIA SESION</h5>
             <li>
                <input class="casilla" type="text" placeholder='usuario' name="user" autofocus>
            </li>
             <li>
                <input class="casilla" type="text" placeholder='password' name="pass">
             </li>
                <input class="button" type="submit" value="Iniciar Sesion">
            </ul>
        </form>
    </div>
</body>
</html>