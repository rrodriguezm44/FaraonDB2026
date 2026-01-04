<?php

require_once "conexion.php";

class TableroModelo
{
  static public function mdlGetDatosTablero()
  {

    $stmt = Conexion::conectar()->prepare('call prc_ObtenerDatosTablero()');

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  static public function mdlGetVentasMesActual()
  {
    $stmt = Conexion::conectar()->prepare('call prc_ObtenerVentasMesActual()');

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
