<?php
include "include/modelo.php";

$modelo = new Modelo();
$usuarios = $modelo->listarUsuarios();

?>
<!DOCTYPE HTML>
<html>
  <head></head>
  <body>
    <?php foreach ($usuarios as $usuario): ?>
      <p><?php echo $usuario['id']; ?><span> - </span><?php echo $usuario['nombre']; ?></p>
    <?php endforeach ?>
    <a href="index.php">Volver</a>
  </body>
</html>
