<?php
include "include/modelo.php";

$modelo = new Modelo();

if(isset($_POST['enviar']))
{
	if($_POST['usuario'] == '' or $_POST['clave'] == '' or $_POST['reclave'] == '')
	{
		echo "Campos vacios. Por favor llene todos los campos";
	}
	else if($_POST['clave'] != $_POST['reclave'])
	{
		echo "Contraseñas no coinciden";
	}
	else
	{
		$modelo->registrarUsuario($_POST['usuario'], $_POST['clave']);
	}
}
?>
<!DOCTYPE HTMl>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="POST">
		<div>
			<label>Usuario: </label><br>
			<input type="text" name="usuario">
		</div>
		<div>
			<label>Contraseña: </label><br>
			<input type="password" name="clave">
		</div>
		<div>
			<label>Repita contraseña: </label><br>
			<input type="password" name="reclave">
		</div>
		<div>
			<br><input type="submit" name="enviar" value="Registrar">
		</div>
	</form>
	<a href="index.php">Volver</a>
</body>
</html>
