<?php

require 'config.php';

class Modelo
{
  private $conexion;

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
    $sql = "SELECT * FROM usuarios WHERE nombre='$usuario';";
    $resultado = $this->conexion->query($sql);
    if ($resultado->num_rows > 0)
    {
      echo "El nombre de usuario ya existe, por favor elija otro";
      return false;
    }
    else
    {
      $sql = "INSERT INTO usuarios (nombre, clave) VALUES ('$usuario', '$clave');";
      if ($this->conexion->query($sql) == TRUE){
        echo "Usuario creado exitosamente";
        return true;
      }
      else {
        echo "Error al crear usuario: ". $conexion->error;
        return false;
      }
    }
    $conexion->close();
  }
}
