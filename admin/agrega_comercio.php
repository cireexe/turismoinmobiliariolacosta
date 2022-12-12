<?php
include("conexion.php");
// echo "<pre>";print_r($_POST);
extract($_POST);
// print_r($_FILES['imagen']['name']);die;
$mail = isset($mail) ? null :  "";
$imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] :  "";
echo "<pre>";
// print_r($_FILES);die;
if (isset($imagen) && $imagen !== "") {
    //Recogemos el archivo enviado por el formulario
    // print_r($_FILES);die;
    $arrayImagenes = [];
    $archivos = $_FILES['imagen']['name'];
    // print_r($archivo);die;
    //Si el archivo contiene algo y es diferente de vacio
    foreach($archivos as $key => $value){
        // print_r($value);die;
        $archivo = $value;
        if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['imagen']['type'][$key];
        $tamano = $_FILES['imagen']['size'][$key];
        $temp = $_FILES['imagen']['tmp_name'][$key];
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            return '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
        }
        else {
            //Si la imagen es correcta en tamaño y tipo
            //Se intenta subir al servidor
            if (move_uploaded_file($temp, 'images/'.$archivo)) {
                //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('images/'.$archivo, 0777);
                    array_push($arrayImagenes, $value);
                
            //      //Mostramos el mensaje de que se ha subido co éxito
            //      echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
            //      //Mostramos la imagen subida
            //      echo '<p><img src="images/'.$archivo.'"></p>';
            }
            else {
                //Si no se ha podido subir la imagen, mostramos un mensaje de error
                return '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
        }
    }

 }
//  print_r($arrayImagenes);die;
if(isset($_FILES['imagen_portada'])) {
    $imagen_portada = $_FILES['imagen_portada']['name'];
    $tipo = $_FILES['imagen_portada']['type'];
    $tamano = $_FILES['imagen_portada']['size'];
    $temp = $_FILES['imagen_portada']['tmp_name'];
    if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
        return '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
    }
    else {
        //Si la imagen es correcta en tamaño y tipo
        //Se intenta subir al servidor
        if (move_uploaded_file($temp, 'images/'.$imagen_portada)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            chmod('images/'.$imagen_portada, 0777);
                array_push($arrayImagenes, $value);
            
        //      //Mostramos el mensaje de que se ha subido co éxito
        //      echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
        //      //Mostramos la imagen subida
        //      echo '<p><img src="images/'.$archivo.'"></p>';
        }
        else {
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            return '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
        }
    }
}
 $masImagenes = json_encode($arrayImagenes);

if($guardar == "guardar") {
    $sql = "insert into comercios values (NULL, '$nombre', '$direccion', '$id_localidad', 'asdfsd',' $telefono', '$descripcion', $id_categoria, '$imagen_portada', '$masImagenes')";
} else if($guardar == "actualizar") {
    if(isset($archivo) && $archivo != "") {
        $sql = "UPDATE comercios set 
        nombre = '$nombre', 
        direccion = '$direccion', 
        id_localidad = '$id_localidad', 
        mail = '$mail',
        telefono = '$telefono', 
        descripcion = '$descripcion', 
        id_categoria = $id_categoria, 
        imagen = '$imagen_portada',
        imagenes = '$masImagenes'
        where id = $id_comercio
        ";
    } else {
        $sql = "UPDATE comercios set 
        nombre = '$nombre', 
        direccion = '$direccion', 
        id_localidad = '$id_localidad', 
        mail = '$mail',
        telefono = '$telefono', 
        descripcion = '$descripcion', 
        id_categoria = $id_categoria,
        imagen = '$imagen_portada',
        imagenes = '$masImagenes'
        where id = $id_comercio
        ";
    }
}
$resultado = mysqli_query($conexion, $sql);
header("Location: formulario_agrega_edita.php");