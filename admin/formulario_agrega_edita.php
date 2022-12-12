<?php 
include('validar.php');
include_once("conexion.php");
// session_destroy();
//echo "<pre>";
$categorias = mysqli_query($conexion, "select * from categorias");
$localidades = mysqli_query($conexion, "select * from localidades");
if(isset($_GET['id_comercio'])) {
$sql = "SELECT * FROM comercios where id = " . $_GET['id_comercio'];
$query = mysqli_query($conexion, $sql);
$comercio = mysqli_fetch_assoc($query);
// print_r($comercio);

}
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="estiloformulario.css">
	<style>
		.formu {
			display: flex;
			flex-direction: column;
		}
	</style>
<?php include_once("head.php") ?>
<body>
<?php include_once("navbar.php") ?>

<form action="agrega_comercio.php" method="POST" name="formDatosPersonales" enctype="multipart/form-data">
	<div class="formu">
	<label for="opciones">Elija que va a cargar</label>
	<select name="id_categoria" id="opciones">
	<?php 
	foreach($categorias as $key => $value):
		if(isset($comercio['id_categoria']) && $comercio['id_categoria'] === $value['id']) {
			echo "<option selected value='" . $value['id'] . "'>" . $value['nombre'] . "</option>";
		} else {
			echo "<option value='" . $value['id'] . "'>" . $value['nombre'] . "</option>";
		}
	endforeach;
	?>
	<?php if(isset($comercio['id'])): ?> 
		<input type='hidden' value='<?= $comercio['id'] ?>' type="text" name="id_comercio" id="id" />
	<?php endif; ?>
	</select>
	
	<label for="nombre">Nombre</label>
	<?php if(isset($comercio['nombre'])): ?>
		<input value='<?= $comercio['nombre'] ?>' type="text" name="nombre" id="nombre" placeholder="Escribir nombre" />
	<?php else: ?>
		<input type="text" name="nombre" id="nombre" placeholder="Escribir nombre" />
	<?php endif; ?>

	<label for="ubicacion">Direccion</label>
	<?php if(isset($comercio['direccion'])): ?>
		<input value='<?= $comercio['direccion'] ?>' type="text" name="direccion" id="direccion" placeholder="Direccion"/>
	<?php else: ?>
		<input type="text" name="direccion" id="direccion" placeholder="Direccion"/>
	<?php endif; ?>

	<label for="opciones">Localidad</label>
	<select name="id_localidad" id="localidades">
	<?php 
	foreach($localidades as $key => $value):
		if(isset($comercio['id_localidad']) && $comercio['id_localidad'] === $value['id']) {
			echo "<option selected value='" . $value['id'] . "'>" . $value['localidad'] . "</option>";
		} else {
			echo "<option value='" . $value['id'] . "'>" . $value['localidad'] . "</option>";
		}
		// echo "<option value='" . $value['id'] . "'>" . $value['localidad'] . "</option>";
	endforeach;
	?>
	</select>

	<label for="telefono">Telefono</label>
	<?php if(isset($comercio['telefono'])): ?>
		<input value='<?= $comercio['telefono'] ?>' type="text" name="telefono" id="telefono" placeholder="telefono"/>
	<?php else: ?>
		<input type="text" name="telefono" id="telefono" placeholder="telefono"/>
	<?php endif; ?>

	<!-- <input type ="tel" name="telefono" id="telefono" placeholder="telefono"/> -->

	<label for="descripcion">Breve descrpipcion</label>
	<?php if(isset($comercio['descripcion'])): ?>
		<textarea name="descripcion" for="decripcion" placeholder="describe brevemente en menos de 300 carácteres" maxlength="300"><?= $comercio['descripcion'] ?></textarea>
	<?php else: ?>
		<textarea name="descripcion" for="decripcion" placeholder="describe brevemente en menos de 300 carácteres" maxlength="300"></textarea>
	<?php endif; ?>
	<!-- <textarea name="descripcion" for="decripcion" placeholder="describe brevemente en menos de 300 carácteres" maxlength="300"></textarea> -->
	
	<label for="telefono">Imagen de Portada</label>
	<input type ="file" name="imagen_portada" id="imagen_portada" placeholder="imagen_portada"/>
	<label for="telefono">Mas imágenes</label>
	<input type ="file" name="imagen[]" id="imagen" placeholder="imagen" multiple/>

	
	<?php 
	if(isset($_GET['id_comercio'])) {
		echo '<input type="submit" name="guardar" value="actualizar"/>';
	} else {
		echo '<input type="submit" name="guardar" value="guardar"/>';
	}
	?>	
	</div>
</form>

</body>
</html>
<!-- <a href="cerrarsesion.php">cerrar sesion</a> -->