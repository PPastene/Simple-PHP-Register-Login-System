<?php

require 'config.php';

class Modelo
{
  private $conexion ;

  function __construct()
  {
      try {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      } catch (Exception $e) {
        echo $e->getMessage();
      }
  }

  function listarUsuarios()
  {
    $resultado = $this->conexion->query("SELECT * from usuarios");
    $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
    $resultado->close();
    return $usuarios;
  }

  function registrarUsuario($usuario, $clave)
  {
    $resultado = $this->conexion->query("SELECT * FROM usuarios WHERE nombre='$usuario';");
    if ($resultado->num_rows > 0)
    {
      echo "usuario existe";
    }
    else
    {
      echo "usuario no existe";
    }
  }
}
